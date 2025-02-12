<?php include '../../includes/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tools/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools/other-tools/">Other Tools</a></li>
            <li class="breadcrumb-item active">Time Converter</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-clock fa-3x mb-3 text-danger"></i>
                        <h1 class="h3">Time Converter</h1>
                        <p class="text-muted">Convert between different time zones.</p>
                    </div>
                    <form id="timeConverterForm">
                        <div class="mb-3">
                            <label class="form-label">Select Date and Time</label>
                            <input type="datetime-local" class="form-control" id="dateTimeInput" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">From Time Zone</label>
                            <select class="form-control" id="fromTimeZone">
                                <option value="UTC">UTC</option>
                                <option value="America/New_York">Eastern Time (US & Canada)</option>
                                <option value="Europe/London">London</option>
                                <option value="Asia/Kolkata">India Standard Time</option>
                                <option value="Australia/Sydney">Sydney</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">To Time Zone</label>
                            <select class="form-control" id="toTimeZone">
                                <option value="UTC">UTC</option>
                                <option value="America/New_York">Eastern Time (US & Canada)</option>
                                <option value="Europe/London">London</option>
                                <option value="Asia/Kolkata">India Standard Time</option>
                                <option value="Australia/Sydney">Sydney</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Convert</button>
                        </div>
                    </form>
                    <div id="timeResult" class="text-center mt-4" style="display: none;">
                        <h2 class="h5">Converted Time: <span id="convertedTime"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
<script>
document.getElementById('timeConverterForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const dateTime = document.getElementById('dateTimeInput').value;
    const fromZone = document.getElementById('fromTimeZone').value;
    const toZone = document.getElementById('toTimeZone').value;

    if (!dateTime) {
        alert('Please select a date and time.');
        return;
    }

    const convertedTime = moment.tz(dateTime, fromZone).tz(toZone).format('YYYY-MM-DD HH:mm:ss');
    document.getElementById('convertedTime').textContent = convertedTime;
    document.getElementById('timeResult').style.display = 'block';
});
</script>

<?php include '../../includes/footer.php'; ?>
