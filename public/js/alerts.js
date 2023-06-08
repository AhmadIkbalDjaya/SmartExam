const alertPlaceholder = document.getElementById("alerts");
const appendAlert = (message, type) => {
    const wrapper = document.createElement("div");
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        "</div>",
    ].join("");

    alertPlaceholder.append(wrapper);
};

// Alerts tambah Sekolah
const alertTrigger = document.getElementById("liveAlertBtn");
if (alertTrigger) {
    alertTrigger.addEventListener("click", () => {
        appendAlert("Berhasil menambahkan Sekolah!", "success");
    });
}

// Alerts Edit Sekolah
const alertTrigger2 = document.getElementById("liveAlertBtn2");
if (alertTrigger2) {
    alertTrigger2.addEventListener("click", () => {
        appendAlert("Berhasil mengubah Sekolah!", "info");
    });
}

// Alerts Hapus Sekolah
const alertTrigger3 = document.getElementById("liveAlertBtn3");
if (alertTrigger3) {
    alertTrigger3.addEventListener("click", () => {
        appendAlert("Berhasil menghapus Sekolah!", "danger");
    });
}
