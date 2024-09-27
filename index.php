<?php

$url = 'https://aslamsharedapi-production.up.railway.app/api/contract-by-name?name=A';

$ch = curl_init($url);


$key = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhc2xhbS1hcGkiLCJzdWIiOiJoZiIsImV4cCI6MTcyNzQ2NzQ2NH0.PYyGXayw9aMtpexT4yhKB9jshNwCaqU2EFwQh1utpqo';
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
    <title>Sistema Dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
        }
        .navbar {
            background-color: #007bff; 
        }
        .profile-card {
            background-color: #f8f9fa; 
            border: 1px solid #007bff; 
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        .form-control[disabled] {
            background-color: #e9ecef; 
            color: #495057; 
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .tab-pane {
            display: none; 
        }
        .tab-pane.active {
            display: block; 
        }
        
        .button-container {
            display: flex;
            overflow-x: auto; 
            padding: 10px 0;
        }
        .button-container .btn {
            flex: 0 0 auto;
            margin-right: 10px; 
        }
        .sub-buttons {
            display: none;
        }
        .show-sub-buttons .sub-buttons {
            display: flex;
        }
        .table td.st-col {
            background-color: #ff0015e3;
            color: #ebebeb;
            font-weight: bold;
        }
    </style>
    
    <title>Página com Formulários</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="#">HF Solucoes</a>
    </nav>

    <div class="container">
        <h1 class="text-center mt-4">Formulários Interativos</h1>
        <div class="text-center mb-4">
            <div class="button-container">
                <button class="btn btn-primary" onclick="showForm('identificacao')">Identificação</button>
                <button class="btn btn-primary" onclick="showForm('dados')">Dados</button>
                <button class="btn btn-primary" onclick="showForm('beneficiarios')">Beneficiarios</button>
                <button class="btn btn-primary" onclick="showForm('observacoes')">observacoes</button>
                <button class="btn btn-primary" onclick="showForm('emprestimos')">emprestimos</button>
                <button class="btn btn-primary" onclick="showForm('atendimento')">atendimento</button>
                <button class="btn btn-primary" id="mainButton" onclick="toggleSubButtons()">Financeiro</button>
                <div class="sub-buttons">
                    <button class="btn btn-secondary" onclick="showForm('parcelas')">Parcelas</button>
                    <button class="btn btn-secondary" onclick="showForm('acordos')">Acordos</button>
                    <button class="btn btn-secondary" onclick="showForm('adicional')">Adicional</button>
                    <button class="btn btn-secondary" onclick="showForm('servicos')">Servicos</button>
            </div>
        </div>

        <div id="formsContainer">
      
            <div class="tab-pane active" id="identificacao" role="tabpanel">
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
                            <div class="col-md-5 form-group">
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

        
            <div class="tab-pane" id="dados" role="tabpanel">
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

         
            <div class="tab-pane" id="beneficiarios" role="tabpanel">
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

           
            <div class="tab-pane" id="observacoes" role="tabpanel">
                <div class="profile-card">
                    <h2 class="text-center">observacoes</h2>
                    <form>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="Teste1_Info">Informação de Teste:</label>
                                <input type="text" class="form-control" id="observacoes1" value="Informação 1" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

      
            <div class="tab-pane" id="emprestimos" role="tabpanel">
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

            <!-- Formulário de Teste 3 -->
            <div class="tab-pane" id="atendimento" role="tabpanel">
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
            


            <div class="tab-pane" id="parcelas" role="tabpanel">
                <div class="profile-card mt-3">
                    <h2 class="text-center">Parcelas</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ST</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Competencia</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Desconto</th>
                                    <th scope="col">Acrescimo</th>
                                    <th scope="col">Juros</th>
                                    <th scope="col">Total Pago</th>
                                    <th scope="col">DT. pagamento</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="st-col"></td>
                                    <td>Plano</td>
                                    <td>Janeiro/2025</td>
                                    <td>27/08/2024</td>
                                    <td>110,00</td>
                                    <td>0,00</td>
                                    <td>0,00</td>
                                    <td>240,00</td>
                                    <td>240,00</td>
                                    <td>07/12/2024</td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="acordos" role="tabpanel">
                <div class="profile-card mt-3">
                    <h2 class="text-center">Acordos</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">R$ total</th>
                                    <th scope="col">R$ entrada</th>
                                    <th scope="col">DT. entrada</th>
                                    <th scope="col">Parc</th>
                                    <th scope="col">R$ parcela</th>
                                    <th scope="col">1 parcela</th>
                                    <th scope="col">Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1534</td>
                                    <td>27/08/2024</td>
                                    <td>romeu da silva</td>
                                    <td>1110,00</td>
                                    <td>500,00</td>
                                    <td>27/08/2024</td>
                                    <td>1</td>
                                    <td>240,00</td>
                                    <td>07/12/2024</td>
                                    <td>Ativo</td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="adicional" role="tabpanel">
                <div class="profile-card mt-3">
                    <h2 class="text-center">Adicional</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ST</th>
                                    <th scope="col">Descricao</th>
                                    <th scope="col">Beneficiario</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Termino</th>
                                    <th scope="col">R$ valor</th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <tr> 
                                     <td class="st-col"></td>

                                    <td>diferenca parcela</td>
                                    <td>Jose ricardo monte</td>
                                    <td>13/04/2024</td>
                                    <td>14/04/2025</td>
                                    <td>500,00</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="servicos" role="tabpanel">
                <div class="profile-card mt-3">
                    <h2 class="text-center">Servicoes</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ST</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Competencia</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Desconto</th>
                                    <th scope="col">Acrescimo</th>
                                    <th scope="col">Juros</th>
                                    <th scope="col">Total pg</th>
                                    <th scope="col">DT. pg</th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="st-col"></td>
                                    <td>venda</td>
                                    <td>agosto/2024</td>
                                    <td>27/08/2024</td>
                                    <td>11.310,00</td>
                                    <td>00,00</td>
                                    <td>00,00</td>
                                    <td>00,00</td>
                                    <td>11.310,00</td>
                                    <td>07/2/2025</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div> 
    </div>

    <script>
        function showForm(formId) {
            const forms = document.querySelectorAll('.tab-pane');
            forms.forEach(form => {
                form.classList.remove('active'); 
            });
            document.getElementById(formId).classList.add('active'); 
        }

        function toggleSubButtons() {
            const mainButton = document.getElementById('mainButton');
            const buttonContainer = mainButton.closest('.button-container');
            buttonContainer.classList.toggle('show-sub-buttons'); 
        }
        document.addEventListener('DOMContentLoaded', () => {
            showForm('identificacao');
        });
    </script>
