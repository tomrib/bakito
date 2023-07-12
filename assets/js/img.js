    //ci-dessou on vient créer notre variable avec l'ID qui se trouve plus haut dans notre balise <IMG>.
    const image = document.getElementById("preview");
    // La fonction previewPicture
    const previewPicture  = function (e) {

        // e.files contient un objet FileList
        const [picture] = e.files

        // "picture" est un objet File
        if (picture) {

            // L'objet FileReader
            var reader = new FileReader();

            // L'événement déclenché lorsque la lecture est complète
            reader.onload = function (e) {
                // On change l'URL de l'image (base64)
                image.src = e.target.result
            }

            // On lit le fichier "picture" uploadé
            reader.readAsDataURL(picture)
        }
    } 