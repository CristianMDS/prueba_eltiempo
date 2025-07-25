
    const button = document.getElementById('btn-crear');

    button.addEventListener("click", () => {
        let n = document.getElementById('nombre').value;
        let d = document.getElementById('descripcion').value;

        if(n === '' || d === ''){
            alert('el nombre y la descripcion no pueden estar vacios');
        }else{
            alert(`tu nombre ${n} y la descripcion es ${d}`);
        }
    })