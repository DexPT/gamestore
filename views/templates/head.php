<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        .platform-container {
            display: flex;
            flex-wrap: wrap; 
            gap: 30px;
            justify-content: center;
        }

        .platform {
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
            max-width: 100px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: #eee;
            justify-content: center;
            height: 150px;
        }

        img {
            max-width: 100%;
            height: auto; 
            margin: 10px 0; 
        }

        a {
            text-decoration: none;
            color: inherit;
        }
        ul{
            display:flex; 
            list-style-type: none; 
            justify-content:center;
            gap: 32px;
        }
        li {
            list-style: none;
        }
         table, tr, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const removeButtons = document.querySelectorAll('button[name="remove"]');
            const changeInputs = document.querySelectorAll('input[name="changeQuantity"]');

        // Update cart total
        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('tr[data-product_id]').forEach(function(row) {
                const subtotal = parseFloat(row.querySelector('td:nth-child(4)').textContent.replace('€', ''));
                total += subtotal;
            });
            document.querySelector('tr:last-child td:last-child').textContent = total + '€';
        }

        // Remover produto
        for (let button of removeButtons) {
            button.addEventListener("click", () => {
                const tr = button.closest('tr');
                const productId = tr.dataset.product_id;

                if (confirm('Tem certeza de que deseja remover este produto?')) {
                    fetch("<?= ROOT ?>/requests/", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "request=removeProduct&product_id=" + productId
                    })
                    .then(response => response.text()) 
                    .then(text => {
                        console.log("Resposta do servidor (removeProduct):", text); 
                        try {
                            const result = JSON.parse(text);
                            if (result.message && result.message === "OK") {
                                tr.remove();
                                updateCartTotal();
                            } else {
                                alert("Erro ao remover o produto.");
                            }
                        } catch (error) {
                            console.error("Erro ao processar JSON:", error);
                            alert("Erro inesperado ao processar a resposta do servidor.");
                        }
                    })
                    .catch(error => alert("Erro inesperado: " + error));
                }
            });
        }

        //Quantidade
        for (let input of changeInputs) {
            input.addEventListener("change", () => {
                const tr = input.closest('tr');
                const productId = tr.dataset.product_id;

                fetch("<?= ROOT ?>/requests/", {
                    method: "POST",
                    headers: {
                        "Content-Type":"application/x-www-form-urlencoded"
                    },
                    body: `request=changeQuantity&quantity=${input.value}&product_id=${productId}`
                })
                .then(response => response.text()) 
                .then(text => {
                /*   console.log("Resposta do servidor (changeQuantity):", text); */

                    try {
                        const result = JSON.parse(text); 
                        if (result.message && result.message === "OK") {
                            const price = parseFloat(tr.querySelector('td:nth-child(3)').textContent.replace('€', ''));
                            const newSubtotal = (price * input.value).toFixed(2);
                            tr.querySelector('td:nth-child(4)').textContent = newSubtotal + '€';
                            updateCartTotal();
                        } else {
                            alert(result.message || "Erro ao atualizar a quantidade.");
                        }
                    } catch (error) {
                        console.error("Erro ao processar JSON:", error);
                        alert("Erro inesperado ao processar a resposta do servidor.");
                    }
                })
                .catch(error => alert("Erro inesperado: " + error));
            });
        }
    });
    
    document.addEventListener('DOMContentLoaded', function() { 
        const form = document.getElementById('updateProfileForm');
        const messageDiv = document.getElementById('message');

        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch("<?= ROOT ?>/profile/", {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return response.json();
                    } else {
                        throw new Error("A resposta não está no formato JSON");
                    }
                })
                .then(data => {
                    if (data.success) {
                        messageDiv.textContent = 'Perfil atualizado com sucesso!';
                        messageDiv.style.color = 'green';
                    } else {
                        messageDiv.textContent = 'Falha ao atualizar o perfil: ' + data.error;
                        messageDiv.style.color = 'red';
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    messageDiv.textContent = 'Erro ao atualizar o perfil. Verifique o console para mais detalhes.';
                    messageDiv.style.color = 'red';
                });
            });
        } else {
            console.error('O formulário não foi encontrado.');
        }
    });




    </script>

</head>