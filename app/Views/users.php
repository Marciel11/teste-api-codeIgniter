<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>API - CodeIgniter</title>
</head>
<body>

    <div class="container mt-5">
      
        <form class="row g-3">
        <span class= "mb-10 text-center fw-bold"> Cadastro de Clientes</span>
        <label for="basic-url" class="form-label">Cliente</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cliente" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <label for="basic-url" class="form-label">CPF/CNPJ</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="CPF/CNPJ" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            <label for="basic-url" class="form-label">Endereço</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Endereço" id="basic-url" aria-describedby="basic-addon3">
            </div>
            <label for="basic-url" class="form-label">Endereço</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control">
            </div>
            <label for="basic-url" class="form-label">Tipo de Cliente</label>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Selecione...</option>
                    <option value="PF">Pessoa Física</option>
                    <option value="PJ">Pessoa Jurídica</option>
                </select>
            </div>
        </form>
    </div>


    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Tipo Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <td> <?php echo $user['id'] ?> </td>
                        <td> <?php echo $user['name_or_fantasy'] ?> </td>
                        <td> <?php echo $user['cpf_cnpj'] ?> </td>
                        <td> <?php echo $user['address'] ?> </td>
                        <td> <?php echo $user['type_user'] ?> </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
    </table>
</html>