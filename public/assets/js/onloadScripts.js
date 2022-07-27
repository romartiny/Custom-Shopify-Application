window.onload = function() {
    let customDates = document.getElementsByClassName('created-date');
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();
    for (let i=0; i<customDates.length; i++) {
        let customDate = new Date(customDates[i].innerHTML);
        let year = customDate.getFullYear();
        let month = (customDate.getMonth()+1).toString().padStart(2, '0');
        let day = customDate.getDate().toString().padStart(2, '0');
        let hour = (customDate.getHours().toString() < 10)
            ? 0 + customDate.getHours().toString() : customDate.getHours().toString();
        let minute = (customDate.getMinutes().toString() < 10)
            ? 0 + customDate.getMinutes().toString() : customDate.getMinutes().toString();
        let second = (customDate.getSeconds().toString() < 10)
            ? 0 + customDate.getSeconds().toString() : customDate.getSeconds().toString();
        if (dd+mm+yyyy === day+month+year) {
            document.getElementsByClassName('created-date')[i].innerHTML =
                'Today '+hour+':'+minute+':'+second;
        } else {
            document.getElementsByClassName('created-date')[i].innerHTML =
                day+"-"+month+"-"+year+' '+hour+':'+minute+':'+second;
        }
    }

    let eventText = document.getElementsByClassName('event-text');
    for (let i=0; i<eventText.length; i++) {
        let rep = eventText[i].innerHTML.replace("_", " ");
        document.getElementsByClassName('event-text')[i].innerHTML = rep;
    }

    let descriptionText = document.getElementsByClassName('description-text');
    for (let i=0; i<descriptionText.length; i++) {
        let rep = descriptionText[i].innerHTML.replace(/\{.*/,'');
        document.getElementsByClassName('description-text')[i].innerHTML = rep;
    }

    document.getElementById('select-all').onclick = function() {
        let checkboxes = document.getElementsByName('checked-box');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    let modal = document.querySelector(".modal")
    let closeBtn = document.querySelector(".close-btn")

    closeBtn.onclick = function(){
        modal.style.display = "none"
    }
    window.onclick = function(e){
        if(e.target == modal){
            modal.style.display = "none"
        }
    }

}
