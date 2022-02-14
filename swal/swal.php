<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script type="text/javascript">
    //success aleart
    function success() {
        Swal.fire({
            title: 'เรียบร้อย!',
            text: 'ดำเนินการเสร็จสิ้น!',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        }).then(function() {
            window.location.href = "/crud/index";
        })
    }
    //error aleart
    function error() {
        Swal.fire({
            icon: 'error',
            title: 'บางอย่างผิดพลาด...',
            text: 'ลองตรวจเช็คว่าใส่ข้อมูลครบทุกช่องหรือไม่',
            timer: 2000,
            showConfirmButton: false
        })
    }

    //wait

    function waiting() {
        let timerInterval
        Swal.fire({
            icon: 'info',
            title: 'ช้าก่อนไม่ต้องรีบ!',
            html: 'กรุณารอสัก 5 วินาทีให้ภาพโหลด.',
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                let timerInterval
                Swal.fire({
                    icon: 'success',
                    title: 'อัพโหลดภาพเรียบร้อย!',
                    timer: 1500,
                    timerProgressBar: false,
                    showConfirmButton: false,
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            }
        })
    }
</script>