

$("#sbm").on("click", function () {
    let task = $("#task").val().trim();
    let date = $("#date").val().trim();

    if (task.length <= 2) {
        alert("Enter task, which len more than 2");
        return false;
    }

    if (task.length >= 20) {
        alert("Enter task, which len less than 20");
        return false;
    }

    if (date.length <= 2) {
        alert("Enter task, which len more than 2");
        return false;
    }

    if (date.length >= 20) {
        alert("Enter task, which len less than 20");
        return false;
    }

    $.ajax({
        url: 'create.php',
        type: 'POST',
        cache: false,
        data: {'task': task, 'date': date},
        dataType: 'html',

        success: function () {
            alert("success\nyour task is: " + task + "\n" +
                "deadline is: " + date)
        }
    })
})
