
    document.getElementById('exchangeForm').addEventListener('submit', function (e) {
        const form = e.target;
        const requiredFields = form.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value || (field.type === 'file' && field.files.length === 0)) {
                field.style.border = '2px solid red';
                valid = false;
            } else {
                field.style.border = '1px solid #ccc';
            }
        });

        if (!valid) {
            e.preventDefault(); // Hentikan submit ke server
            alert('Harap lengkapi semua kolom yang wajib diisi.');
            return;
        }

        // Tampilkan alert sukses (hanya jika valid dan akan disubmit ke backend)
        const alertBox = document.getElementById('successAlert');
        alertBox.style.display = 'block';
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 4000);
    });
