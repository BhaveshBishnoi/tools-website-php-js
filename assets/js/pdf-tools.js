// PDF Processing Library
const PDFTools = {
    // Initialize PDF.js
    async loadPdfJs() {
        if (window.pdfjsLib) return;
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js';
        document.head.appendChild(script);
        await new Promise(resolve => script.onload = resolve);
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    },

    // Load PDF document
    async loadPdf(file) {
        await this.loadPdfJs();
        const arrayBuffer = await file.arrayBuffer();
        return await pdfjsLib.getDocument(arrayBuffer).promise;
    },

    // Get PDF information
    async getPdfInfo(file) {
        const pdfDoc = await this.loadPdf(file);
        return {
            numPages: pdfDoc.numPages,
            fingerprint: pdfDoc.fingerprint,
            fileName: file.name,
            fileSize: this.formatFileSize(file.size)
        };
    },

    // Split PDF by page ranges
    async splitPdf(file, ranges) {
        await this.loadPdfJs();
        const PDFLib = window.PDFLib;
        const pdfDoc = await PDFLib.PDFDocument.load(await file.arrayBuffer());
        const results = [];

        for (const range of ranges) {
            const newPdf = await PDFLib.PDFDocument.create();
            const pages = await newPdf.copyPages(pdfDoc, range);
            pages.forEach(page => newPdf.addPage(page));
            const pdfBytes = await newPdf.save();
            results.push(pdfBytes);
        }

        return results;
    },

    // Convert PDF to Word (using Mammoth.js for basic conversion)
    async pdfToWord(file, options = {}) {
        const pdfDoc = await this.loadPdf(file);
        let text = '';
        
        for (let i = 1; i <= pdfDoc.numPages; i++) {
            const page = await pdfDoc.getPage(i);
            const content = await page.getTextContent();
            const pageText = content.items.map(item => item.str).join(' ');
            text += pageText + '\n\n';
        }

        // Convert to Word format
        const docx = await this.textToDocx(text, options);
        return docx;
    },

    // Convert text to DOCX using docx.js
    async textToDocx(text, options) {
        const { Document, Packer, Paragraph } = docx;
        const doc = new Document({
            sections: [{
                properties: {},
                children: text.split('\n').map(line => 
                    new Paragraph({
                        text: line,
                        ...options
                    })
                )
            }]
        });

        return await Packer.toBlob(doc);
    },

    // Compress PDF
    async compressPdf(file, quality = 'medium') {
        const pdfDoc = await this.loadPdf(file);
        const compressedDoc = await PDFLib.PDFDocument.create();
        
        for (let i = 1; i <= pdfDoc.numPages; i++) {
            const page = await pdfDoc.getPage(i);
            const newPage = compressedDoc.addPage([page.width, page.height]);
            
            // Compress images if any
            const ops = await page.getOperatorList();
            for (let j = 0; j < ops.fnArray.length; j++) {
                if (ops.fnArray[j] === pdfjsLib.OPS.paintJpegXObject) {
                    const imgData = ops.argsArray[j][0];
                    const compressedImg = await this.compressImage(imgData, quality);
                    newPage.drawImage(compressedImg);
                }
            }
            
            // Add text content
            const content = await page.getTextContent();
            content.items.forEach(item => {
                newPage.drawText(item.str, {
                    x: item.transform[4],
                    y: item.transform[5],
                    size: item.fontSize
                });
            });
        }
        
        return await compressedDoc.save();
    },

    // Remove pages from PDF
    async removePages(file, pagesToRemove) {
        const pdfDoc = await PDFLib.PDFDocument.load(await file.arrayBuffer());
        const pages = pdfDoc.getPages();
        
        // Sort in descending order to avoid index shifting
        pagesToRemove.sort((a, b) => b - a);
        
        for (const pageNum of pagesToRemove) {
            if (pageNum > 0 && pageNum <= pages.length) {
                pdfDoc.removePage(pageNum - 1);
            }
        }
        
        return await pdfDoc.save();
    },

    // Helper function to format file size
    formatFileSize(bytes) {
        const units = ['B', 'KB', 'MB', 'GB'];
        let size = bytes;
        let unitIndex = 0;
        
        while (size >= 1024 && unitIndex < units.length - 1) {
            size /= 1024;
            unitIndex++;
        }
        
        return `${size.toFixed(2)} ${units[unitIndex]}`;
    },

    // Download blob as file
    downloadBlob(blob, fileName) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
};

// Export for use in other files
window.PDFTools = PDFTools;
