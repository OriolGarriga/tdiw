// function productes(categoriaId) {
//     BorrarCategories();

//     response = fetch(`/../index.php?accio=productes&Id=${categoriaId}`)
//         .then(response => {
//             if(!response.ok) {
//                 throw new Error("Error al servidor");
//             }
//             return response.text();
//         })
//         .then(text=> {
//             console.log(text);
//             return JSON.parse(text);
//         })
//         .then(product => {
//             var html = '';
//             if (product.length > 0) {
//                 product.forEach(p => {
//                     html += `
//                         <div class= "product">
//                             <h3>${p.nom}</h3>
//                             <p>Preu: ${p.Preu ? p.Preu: 'No disponible'}</p>
//                             <img src="${p.Imatge ? p.Imatge : '/../img/categoria- Taula.jpg'}" alt="Imatge de ${p.nom}" class="JOCS" onclick="DetallProductes(${p.id})">
//                         </div>                    
//                     `;
//                 });
//             } else {
//                 html = '<p>No hem trobat productes per a aquesta categoria</p>';
//             }
//             document.getElementById('prod').innerHTML = html;
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             document.getElementById('prod').innerHTML = '<p>Error al carregar els productes</p>';
//         });
// }

function productes(categoriaId) {
    fetch(`/index.php?accio=productes&Id=${categoriaId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            document.getElementById("LlistatCat").innerHTML = data;
        })
        .catch(error => {
            console.error('ERROR en el fetch:', error);
        });
}


function BorrarCategories() {
    var divCategories = document.getElementById('categories');
    divCategories.style.display = 'none';
}


function DetallProductes(IDProducte) {
    BorrarCategories();

    fetch(`../index.php?accio=Detall&Id=${IDProducte}`)
        .then(response => response.json())
        .then(DetallProducte => {
            detallHTML = `
                <h2>${DetallProducte.nom}</h2>`;
                document.getElementById('descripcio').innerHTML = detallHTML;
        })
        .catch(error => {
            console.error('Error al carregar els detalls del producte', error);
        });
}