function archiveEmployee(id) {
    const path = "./ajax/ajax-archive.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `archived_users=item&users_id=${id}`,
    })
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            data = data.trim();
            console.log(data)
            if (data == "delete") {
                alertify.success('Users move to archived. ');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(`Something went wrong on our end. Please try again or contact the developer.`, "bottom-right", "error");
            }
        })
        .catch(console.error)
}

function archiveFile(id) {
    const path = "./ajax/ajax-archive.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `archived_file=item&id=${id}`,
    })
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            data = data.trim();
            console.log(data)
            if (data == "delete") {
                alertify.success('Document move to archived. ');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(`Something went wrong on our end. Please try again or contact the developer.`, "bottom-right", "error");
            }
        })
        .catch(console.error)
}

function archiveOutMemo(id) {
    const path = "./ajax/ajax-archive.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `archived_out=item&id=${id}`,
    })
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            data = data.trim();
            console.log(data)
            if (data == "delete") {
                alertify.success('Memo move to archived. ');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(`Something went wrong on our end. Please try again or contact the developer.`, "bottom-right", "error");
            }
        })
        .catch(console.error)
}

function archiveInMemo(id) {
    const path = "./ajax/ajax-archive.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `archived_in=item&id=${id}`,
    })
        .then((response) => {
            return response.text();
        })
        .then((data) => {
            data = data.trim();
            console.log(data)
            if (data == "delete") {
                alertify.success('Memo move to archived. ');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(`Something went wrong on our end. Please try again or contact the developer.`, "bottom-right", "error");
            }
        })
        .catch(console.error)
}

