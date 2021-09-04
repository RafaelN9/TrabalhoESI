var searchboxElement = document.querySelector("#search-box");
searchboxElement.addEventListener('keyup', ()=>{

    let value = searchboxElement.value;
    value = value.toUpperCase();

    let allRows = document.getElementsByTagName('tr');
    for(element of allRows){
        if(element.id == 'head') continue;
        element.style['display'] = 'none';
        let name = element.children[1].textContent;
        name = name.toUpperCase();
        console.log(name);
        console.log(value);
        if(name.includes(value)){
            element.style['display'] = 'table-row';
        }
    }

});