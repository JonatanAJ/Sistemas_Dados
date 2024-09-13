<?php

$url = 'https://aslamsharedapi-production.up.railway.app/api/contract-by-name?name=A';

$ch = curl_init($url);


$key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhc2xhbS1hcGkiLCJzdWIiOiJoZiIsImV4cCI6MTcyNjI1ODc4NH0.jYSmB0D8cS2aUJwNzoJhiD-qSnH73YxKOgLr2Ab3T20';
$header = [
    'Accept: application/json',
    'Authorization: Bearer ' .$key
];

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $header
]);

$response = curl_exec($ch);

$data = json_decode($response, true);

curl_close($ch);

$cdPlano = 10001;
$Dados = null;

foreach ($data as $DadosPessoa) {
    if ($DadosPessoa['cdPlano'] == $cdPlano) {
        $Dados = $DadosPessoa;
        break;
    }
}



?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Pessoa</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 20px;
        }

        .profile-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-control[disabled] {
            background-color: #e9ecef;
            opacity: 1;
        }

        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .table td.st-col {
            background-color: #ff0015e3;
            color: #ebebeb;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand text-center" href="#">Perfil da Pessoa</a>
        </nav>
        <div class="container profile-container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-identificacao" data-toggle="tab" href="#identificacao" role="tab" aria-controls="identificacao" aria-selected="true">Identificação</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="tab-dados" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="false">Dados</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="tab-benefeciarios" data-toggle="tab" href="#benefeciarios" role="tab" aria-controls="benefeciarios" aria-selected="false">Beneficiários</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="tab-observacoes" data-toggle="tab" href="#observacoes" role="tab" aria-controls="observacoes" aria-selected="false">observacoes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-emprestimos" data-toggle="tab" href="#emprestimos" role="tab" aria-controls="emprestimos" aria-selected="false">emprestimos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="tab-atendimento" data-toggle="tab" href="#atendimento" role="tab" aria-controls="atendimento" aria-selected="false">atendimento</a>
                </li>


            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="identificacao" role="tabpanel" aria-labelledby="tab-identificacao">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">Identificação</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="ID_contrato">Código:</label>
                                    <input type="text" class="form-control" id="ID_contrato" value="<?php echo htmlspecialchars($Dados['cdPlano']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="CPF_CNPJ">CPF/CNPJ:</label>
                                    <input type="text" class="form-control" id="CPF_CNPJ" value="<?php echo htmlspecialchars($Dados['cpfTitular']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Nome">Nome:</label>
                                    <input type="text" class="form-control" id="Nome" value="<?php echo htmlspecialchars($Dados['nmTitular']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Sexo">Sexo:</label>
                                    <input type="text" class="form-control" id="Sexo" value="<?php echo htmlspecialchars($Dados['sexoTitular']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="RG">RG:</label>
                                    <input type="text" class="form-control" id="RG" value="<?php echo htmlspecialchars($Dados['rgTitular']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="UF">UF:</label>
                                    <input type="text" class="form-control" id="UF" value="CE" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="Telefone1">Telefone1:</label>
                                    <input type="text" class="form-control" id="Telefone1" value="<?php echo htmlspecialchars($Dados['fone1Titular']); ?>" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="Telefone2">Telefone2:</label>
                                    <input type="text" class="form-control" id="Telefone2" value="<?php echo htmlspecialchars($Dados['fone2Titular']); ?>" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="Telefone3">Telefone3:</label>
                                    <input type="text" class="form-control" id="Telefone3" value="<?php echo htmlspecialchars($Dados['fone3Titular']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="Email">Email:</label>
                                    <input type="text" class="form-control" id="Email" value="<?php echo htmlspecialchars($Dados['emailTitular']); ?>" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="profile-card mt-3">
                        <h2 class="text-center">Endereço</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="CEP">CEP:</label>
                                    <input type="text" class="form-control" id="CEP" value="<?php echo htmlspecialchars($Dados['cepEndereco']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="UF">UF:</label>
                                    <input type="text" class="form-control" id="UF" value="<?php echo htmlspecialchars($Dados['nmUf']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Cidade">Cidade:</label>
                                    <input type="text" class="form-control" id="Cidade" value="<?php echo htmlspecialchars($Dados['nmCidade']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Bairro">Bairro:</label>
                                    <input type="text" class="form-control" id="Bairro" value="<?php echo htmlspecialchars($Dados['nmBairro']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Logradouro">Logradouro:</label>
                                    <input type="text" class="form-control" id="Logradouro" value="<?php echo htmlspecialchars($Dados['nmLogradouro']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Completo">Complemento:</label>
                                    <input type="text" class="form-control" id="Completo" value="<?php echo htmlspecialchars($Dados['compLogradouro']); ?>" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php

                $url = 'https://aslamsharedapi-production.up.railway.app/api/contract-by-name-and-document?cdPlano=10001';

                $ch2 = curl_init($url);


                $header = [
                    'Accept: application/json',
                    
                    'Authorization: Bearer ' .$key
                ];

                curl_setopt_array($ch2, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $header
                ]);

                $response = curl_exec($ch2);

                $data = json_decode($response, true);

                curl_close($ch2);

                $cdPlano = 52;
                $DadosPessoa = null;
              
                

                ?>

                <div class="tab-pane fade" id="dados" role="tabpanel" aria-labelledby="tab-dados">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">Dados</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Responsavel">Responsável:</label>
                                    <input type="text" class="form-control" id="Responsavel" value="SAF planos" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Custo">C. Custo:</label>
                                    <input type="text" class="form-control" id="Custo" value="Alecrim" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="TipoPlano">Tipo de plano:</label>
                                    <input type="text" class="form-control" id="Tipo_Plano" value="<?php echo htmlspecialchars($Dados['nmTipoPlano']); ?>" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="TipoAdmissao">Tipo admissão:</label>
                                    <input type="text" class="form-control" id="Tipo_Admissao" value="Novo" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="TipoCobranca">Tipo cobrança:</label>
                                    <input type="text" class="form-control" id="Tipo_Cobranca" value="Não Informado" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="CanalAquisicao">Canal aquisição:</label>
                                    <input type="text" class="form-control" id="Canal_Aquisicao" value="Equipe de vendas 1" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="EmpresaOrigem">Empresa de origem:</label>
                                    <input type="text" class="form-control" id="Empresa_Origem" value="Não Informado" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="TipoEvento">Tipo evento:</label>
                                    <input type="text" class="form-control" id="Tipo_Evento" value="Plano Novo" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="PeriodoPagamento">Período pagamento:</label>
                                    <input type="text" class="form-control" id="Periodo_Pagamento" value="01. Mensal" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="FormaPagamento">Forma pagamento:</label>
                                    <input type="text" class="form-control" id="Forma_Pagamento" value="<?php echo htmlspecialchars($Dados['nmFormaPagamento']); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="FormaEntrega">Forma entrega:</label>
                                    <input type="text" class="form-control" id="Forma_Entrega" value="Domicílio" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="GrupoManutencao">Grupo de manutenção:</label>
                                    <input type="text" class="form-control" id="Grupo_Manutencao" value="Grupo X" disabled>
                                </div>
                            </div>
                        </form>

                        <div class="profile-card mt-3">

                            <form>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="admissao">Admissão</label>
                                        <input type="text" class="form-control" id="CEP"  disabled>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="vencimento">Vencimento:</label>
                                        <input type="text" class="form-control" id="UF"  disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="1vencimento">Data 1º Vencimento:</label>
                                        <input type="text" class="form-control" id="Cidade"  disabled>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="DTadesao">Data Adesão:</label>
                                        <input type="text" class="form-control" id="Bairro" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="planoAntigo">R$ Plano Antigo:</label>
                                        <input type="text" class="form-control" id="Logradouro" disabled>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="Vlplano">R$ Plano:</label>
                                        <input type="text" class="form-control" id="Completo" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>


                
                <?php

                $url = 'https://aslamsharedapi-production.up.railway.app/api/dependents?cdPlano=10001';

                $chBenefeciarios = curl_init($url);


                $header = [
                    'Accept: application/json',
                   'Authorization: Bearer ' .$key
                ];

                curl_setopt_array($chBenefeciarios, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => $header
                ]);

                $response = curl_exec($chBenefeciarios);

                $data = json_decode($response, true);

                curl_close($chBenefeciarios);

                $cdPlano = 52;
                $DadoBeneficiario = null;

               

                ?>

                <div class="tab-pane fade" id="benefeciarios" role="tabpanel" aria-labelledby="tab-benefeciarios">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">Beneficiários</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ST</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Idade</th>
                                        <th scope="col">Sexo</th>
                                        <th scope="col">Admissão</th>
                                        <th scope="col">Carência</th>
                                        <th scope="col">Carência 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    foreach ($data as $DadosBeneficiarios) {
                 
                                        $DadoBeneficiario = $DadosBeneficiarios;
                                        
                                     ?>
                                  
                                    <tr>
                                        <td class="st-col"></td>
                                        <td>Dependente</td>
                                        <td><?php echo $DadoBeneficiario['nmBeneficiario']?></td>
                                        <td><?php echo $DadoBeneficiario['dtNascimento']?></td>
                                        <td>M</td>
                                        <td><?php echo $DadoBeneficiario['dtAdmissao']?></td>
                                        <td><?php echo $DadoBeneficiario['dtCarencia']?></td>
                                        <td><?php echo $DadoBeneficiario['nmBeneficiario']?></td>
                                    </tr>

                                    <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="tab-observacoes">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">observacoes</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>

                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="emprestimos" role="tabpanel" aria-labelledby="tab-emprestimos">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">emprestimos</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ST</th>
                                        <th scope="col">benefeciario</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">DT.Emprestimo</th>
                                        <th scope="col">DT.Devolucao</th>
                                        <th scope="col">R$ Valor</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="st-col"></td>
                                        <td>Jose Alves da Silva</td>
                                        <td>Cadeira Higienica</td>
                                        <td>24/02/2024</td>
                                        <td>24/05/2024</td>
                                        <td>20,00</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="atendimento" role="tabpanel" aria-labelledby="tab-atendimento">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">atendimento</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ST</th>
                                        <th scope="col">benefeciario</th>
                                        <th scope="col">Coneviado</th>
                                        <th scope="col">Procedimento</th>
                                        <th scope="col">Data </th>
                                        <th scope="col">Hora</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="st-col"></td>
                                        <td>Jose Alves da Silva</td>
                                        <td>Clinica Sao luis</td>
                                        <td>Extracao Gratis</td>
                                        <td>24/05/2024</td>
                                        <td>09:20:00</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Financeiro" role="tabpanel" aria-labelledby="tab-financeiro">
                    <div class="profile-card mt-3">
                        <h2 class="text-center">Financeiro</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">tipo</th>
                                        <th scope="col">Competencia</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Valor </th>
                                        <th scope="col">Desconto</th>
                                        <th scope="col">Acresimos</th>
                                        <th scope="col">Juros</th>
                                        <th scope="col">Total Pago</th>
                                        <th scope="col">DT.Pagamento</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="st-col"></td>
                                        <td>Jose Alves da Silva</td>
                                        <td>Clinica Sao luis</td>
                                        <td>Extracao Gratis</td>
                                        <td>24/05/2024</td>
                                        <td>09:20:00</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>