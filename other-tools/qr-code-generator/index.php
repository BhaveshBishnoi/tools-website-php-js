<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/other-tools/">Other Tools</a></li>
            <li class="breadcrumb-item active">QR Code Generator</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-qrcode fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">QR Code Generator</h1>
                        <p class="text-muted">Generate a QR Code for any text or URL</p>
                    </div>

                    <form id="qrCodeForm">
                        <div class="mb-4">
                            <label class="form-label">Enter Text or URL</label>
                            <input type="text" class="form-control" id="qrText" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-qrcode me-2"></i>Generate QR Code
                            </button>
                        </div>
                    </form>

                    <!-- QR Code Result -->
                    <div id="qrResult" class="text-center mt-4" style="display: none;">
                        <h2 class="h5">Generated QR Code</h2>
                        <img id="qrImage" src="" alt="QR Code" class="img-fluid mt-3">
                        <div class="mt-3">
                            <a id="downloadQR" class="btn btn-success" download>
                                <i class="fas fa-download me-2"></i>Download QR Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructions -->
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h5 mb-3">How to Use the QR Code Generator</h2>
                    <ol class="mb-0">
                        <li class="mb-2">Enter text or a URL in the input field.</li>
                        <li class="mb-2">Click "Generate QR Code" to create the QR Code.</li>
                        <li class="mb-2">Download the QR Code image for use.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('qrCodeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const text = document.getElementById('qrText').value;
    const qrImage = document.getElementById('qrImage');
    const qrResult = document.getElementById('qrResult');
    const downloadQR = document.getElementById('downloadQR');

    if (text.trim() === '') {
        alert('Please enter a valid text or URL.');
        return;
    }
    
    const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodeURIComponent(text)}`;
    qrImage.src = qrUrl;
    downloadQR.href = qrUrl;
    downloadQR.setAttribute('download', 'qrcode.png');
    qrResult.style.display = 'block';
});
</script>

<?php include '../../includes/footer.php'; ?>
