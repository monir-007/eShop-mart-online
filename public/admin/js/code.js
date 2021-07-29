// delete function
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

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

// processing Order
$(function () {
    $(document).on('click', '#processing', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to processing this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, process it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Processed!',
                    'Order on Processing.',
                    'success'
                )
            }
        })
    });
});

// picked Order
$(function () {
    $(document).on('click', '#picked', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to pick this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, pick it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Picked!',
                    'Order Picked.',
                    'success'
                )
            }
        })
    });
});

// shipped Order
$(function () {
    $(document).on('click', '#shipped', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to ship this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, ship it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Shipped!',
                    'Order Shipped.',
                    'success'
                )
            }
        })
    });
});

// delivered Order
$(function () {
    $(document).on('click', '#delivered', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to deliver this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, deliver it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Delivered!',
                    'Order Delivered.',
                    'success'
                )
            }
        })
    });
});

// cancel Order
$(function () {
    $(document).on('click', '#cancel', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to cancel this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3176d7',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Canceled!',
                    'Order Canceled.',
                    'success'
                )
            }
        })
    });
});
// approve Order
$(function () {
    $(document).on('click', '#approve', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to return this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#48a00f',
            cancelButtonColor: '#e83838',
            confirmButtonText: 'Yes, return it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Approved!',
                    'Order Returned.',
                    'success'
                )
            }
        })
    });
});
