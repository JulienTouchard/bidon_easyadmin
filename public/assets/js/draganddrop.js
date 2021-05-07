document.addEventListener("DOMContentLoaded", () => {

    console.log("DRAG AND DROP");
    let file = [];
    const dropZone = document.getElementById("dropZone");
    const fileInfo = document.querySelector(".fileInfo");
    const tbDrag = ["dragenter", "dragleave", "dragover", "drop"];
    tbDrag.forEach(element => {
        dropZone.addEventListener(element, (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (element === "drop") {
                let dt = e.dataTransfer;
                file = dt.files
                //affichage utilisateur
                let name = file[0].name;
                let size = (file[0].size / 1000) + "ko";
                fileInfo.innerHTML = name + " - " + size;
            }
        })
    });
    console.log('FOMULAIRE REGISTER');
    const form = document.forms.registration_form;
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // traiter mon upload et resize img
        if (file.length > 0) {
            //upload
            console.dir(file);
            let formData = new FormData(form);

            formData.append('avatar', file[0]);
            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            }).then(response => {
                response.text().then(
                    (test) => console.log(test)
                )
            })
        }

        // submit
        form.submit();
    })

})
