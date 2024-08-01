const videoPreviewModal = document.getElementById('video-preview-modal');
    const qrDataElementModal = document.getElementById('qr-data-modal');
    const upiInput = document.getElementById('upi');

    // Function to start the camera in the modal
    function startCameraInModal() {
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
            .then((stream) => {
                videoPreviewModal.srcObject = stream;
                captureAndDecodeModal();
            })
            .catch((error) => {
                console.error('Error accessing camera:', error);
            });
    }

    // Capture a frame from the video stream and decode the QR code in the modal
    function captureAndDecodeModal() {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Use computed styles to get the actual dimensions of the video
        const videoStyle = getComputedStyle(videoPreviewModal);
        const width = parseFloat(videoStyle.width);
        const height = parseFloat(videoStyle.height);

        canvas.width = width;
        canvas.height = height;
        context.drawImage(videoPreviewModal, 0, 0, width, height);

        const imageData = context.getImageData(0, 0, width, height);
        const code = jsQR(imageData.data, imageData.width, imageData.height, {
            inversionAttempts: 'dontInvert',
        });

        if (code) {
            console.log(code)
            const upiPattern = /upi:\/\/pay\?pa=([^&]+)/;
            const match = upiPattern.exec(code.data);

            if (match && match[1]) {
                upiInput.value = match[1];
                qrDataElementModal.textContent = `UPI ID: ${match[1]}`;
            } else {
                upiInput.value = '';
                qrDataElementModal.textContent = 'Invalid QR Code Data';
            }
        }

        // Continue capturing frames in the modal
        requestAnimationFrame(captureAndDecodeModal);
    }

    // Event listener for opening the modal
    document.getElementById('scan-btn').addEventListener('click', function () {
        startCameraInModal();
        var myModal = new bootstrap.Modal(document.getElementById('qrModal'), {
            keyboard: false
        });
        myModal.show();
    });

    document.getElementById('select-upi').addEventListener('click', function () {
        // Hide the modal using Bootstrap's modal method
        $('#qrModal').modal('hide');
    });

    document.getElementById('qrModal').addEventListener('hidden.bs.modal', function (e) {
        // Stop the camera when the modal is closed
        videoPreviewModal.srcObject.getTracks().forEach(track => track.stop());
    });