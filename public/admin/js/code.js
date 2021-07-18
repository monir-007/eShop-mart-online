// delete function
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
});


// confirm Order
$(function () {
    $(document).on('click', '#confirm', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to confirm This order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, confirmed it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirm!',
                    'Order Confirmed.',
                    'success'
                )
            }
        })
    });
});
