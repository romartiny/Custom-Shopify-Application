function downloadTXT(txt, filename) {
    let txtFile;
    let downloadLink;

    txtFile = new Blob([txt], {type: "text/txt"});
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(txtFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function exportTableToTXT(filename) {
    let txt = [];
    let rows = document.querySelectorAll("table tr");
    let countChecked = 0;
    let utc = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    for (let i = 0; i < rows.length; i++) {
        let row = [], cols = rows[i].querySelectorAll("td, th");
        let checkboxes = rows[i].querySelectorAll('input[type="checkbox"]:checked');
        for (let checkbox of checkboxes) {
            if (checkbox.checked === true) {
                for (let j = 0; j < cols.length; j++)
                    row.push(cols[j].innerText);
                txt.push(row.join(" | "));
                countChecked = countChecked + 1;
            }
        }
    }
    if (countChecked === 0) {
        $("#exampleModal").modal('show');
    } else {
        downloadTXT(txt.join("\n"), utc + '-' + filename);
    }
}

