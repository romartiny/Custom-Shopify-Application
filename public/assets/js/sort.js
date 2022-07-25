var index;
let toggleBool;
function sorting(tbody, index){
    this.index = index;
    toggleBool = !toggleBool;

    let table= [];
    let tbodyLength = tbody.rows.length;
    for(let i=0; i<tbodyLength; i++){
        table[i] = tbody.rows[i];
    }
    table.sort(compareCells);
    for(let i=0; i<tbody.rows.length; i++){
        tbody.appendChild(table[i]);
    }
}

function compareCells(a,b) {
    let aVal = a.cells[index].innerText;
    let bVal = b.cells[index].innerText;

    aVal = aVal.replace(/\,/g, '');
    bVal = bVal.replace(/\,/g, '');

    if(toggleBool){
        let temp = aVal;
        aVal = bVal;
        bVal = temp;
    }

    if(aVal.match(/^[0-9]+$/) && bVal.match(/^[0-9]+$/)){
        return parseFloat(aVal) - parseFloat(bVal);
    }
    else{
        if (aVal < bVal){
            return -1;
        }else if (aVal > bVal){
            return 1;
        }else{
            return 0;
        }
    }
}
