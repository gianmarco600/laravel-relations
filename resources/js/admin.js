require('./bootstrap');

const deleteForm = document.querySelectorAll('del');
deleteForm.forEach(element => {
    element.addEventListener('submit' , function(e){
        const resp = confirm('sei sicuro di voler cancellare questo dato?');

        if(!resp){
            e.preventDefault();
        }
    })
});