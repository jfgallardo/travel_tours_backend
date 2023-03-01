<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /* return [
            "CentroDeCusto" => "nullable",
            "ChaveDeSeguranca" => "string|nullable",
            "CobrancaDeServico" => "nullable",
            "Departamento" => "string|nullable",
            "InformacoesComplementaresPassageiro":[{
                "Id":2147483647,
                "CentroDeCusto":"String content",
                "Documento":{
                    "Id":2147483647,
                    "Nacionalidade":"String content",
                    "Numero":"String content",
                    "PaisEmissor":"String content",
                    "Tipo":2147483647,
                    "Validade":"\/Date(928160400000-0300)\/"
                },
                "Empenho":"String content",
                "InfantilNome":"String content",
                "InfantilSobrenome":"String content",
                "Nome":"String content",
                "Requisicao":"String content",
                "Sobrenome":"String content",
                "Tipo":"String content"
            }],
            "Matricula":"String content",
            "Pagamento":{
                "CartaoDeCredito":{
                    "Bandeira":2147483647,
                    "CartaoDeCreditoCriptografado":"String content",
                    "CodigoDeSeguranca":"String content",
                    "FinanciamentoId":2147483647,
                    "Numero":"String content",
                    "NumeroDeAutorizacao":"String content",
                    "Parcelas":2147483647,
                    "Tipo":"String content",
                    "TitularCPF":"String content",
                    "TitularEmail":"String content",
                    "TitularNome":"String content",
                    "TitularTelefone":"String content",
                    "Validade":"String content"
                },
                "FormaDePagamento":2147483647,
                "FormaDePagamentoTipo":2147483647,
                "Requisicao":"String content",
                "ValorFaturado":12678967.543233
            },
            "Requisicao":"String content",
            "Solicitante":"String content",
            "TokenDeSeguranca":"String content",
            "TourCode":2147483647,
            "TourCodeManual":"String content",
            "TourCodeManualComissao":12678967.543233,
            "UnidadeDeNegocioId":2147483647,
            "ValidarAnaliseRisco":true,
            "ClassesSelecionadas":[{
                "BaseTarifaria":"String content",
                "Classe":"String content",
                "Familia":"String content",
                "NumeroDoVoo":"String content"
            }],
            "Contatos":[{
                "Id":2147483647,
                "Cidade":"String content",
                "Email":"String content",
                "Endereco":"String content",
                "NumeroDDD":"String content",
                "NumeroDDI":"String content",
                "NumeroTelefone":"String content",
                "Nome":"String content",
                "Tipo":0
            }],
            "DadosPedido":{
                "Id":2147483647,
                "CartaoDeCredito":{
                    "Id":2147483647,
                    "Autorizacao":"String content",
                    "Bandeira":"String content",
                    "CodigoDeSeguranca":"String content",
                    "IgnorarValidacao":true,
                    "Numero":"String content",
                    "TitularCPF":"String content",
                    "TitularNome":"String content",
                    "Validade":"String content"
                },
                "ClienteLogin":{
                    "Id":2147483647,
                    "HashAcesso":"String content",
                    "Login":"String content",
                    "Senha":"String content"
                },
                "FinanciamentoId":2147483647
            },
            "HabilitarFluxoContatoPassageiro":true,
            "IdentificacaoDaViagem":"String content",
            "IdentificacaoDaViagemVolta":"String content",
            "Passageiros":[{
                "Id":2147483647,
                "Assentos":[{
                    "Id":2147483647,
                    "CabineDeServico":"String content",
                    "CodAssento":"String content",
                    "Trecho":"String content",
                    "Valor":12678967.543233
                }],
                "CPF":"String content",
                "Documento":{
                    "Id":2147483647,
                    "Nacionalidade":"String content",
                    "Numero":"String content",
                    "PaisEmissor":"String content",
                    "Tipo":2147483647,
                    "Validade":"\/Date(928160400000-0300)\/"
                },
                "Email":"String content",
                "FaixaEtaria":"String content",
                "FidelidadeTam":"String content",
                "Fidelidades":[{
                    "Id":2147483647,
                    "Companhia":"String content",
                    "DescricaoFidelidade":"String content",
                    "NumeroFidelidade":"String content",
                    "Sistema":2147483647,
                    "TipoFidelidade":2147483647
                }],
                "InfPassaporte":{
                    "Id":2147483647,
                    "Nacionalidade":"String content",
                    "NomeDoMeioPax":"String content",
                    "NomePax":"String content",
                    "Numero":"String content",
                    "PaisEmissor":"String content",
                    "SobrenomePax":"String content",
                    "Validade":"\/Date(928160400000-0300)\/"
                },
                "InfantilLinha":"String content",
                "InfantilNascimento":"\/Date(928160400000-0300)\/",
                "InfantilNome":"String content",
                "InfantilSexo":"String content",
                "InfantilSobrenome":"String content",
                "Linha":"String content",
                "Nascimento":"\/Date(928160400000-0300)\/",
                "Nome":"String content",
                "NomeDoMeio":"String content",
                "NumeroAvianca":"String content",
                "NumeroAzul":"String content",
                "NumeroFidelidadeGenerico":"String content",
                "Passaporte":{
                    "Id":2147483647,
                    "Nacionalidade":"String content",
                    "NomeDoMeioPax":"String content",
                    "NomePax":"String content",
                    "Numero":"String content",
                    "PaisEmissor":"String content",
                    "SobrenomePax":"String content",
                    "Validade":"\/Date(928160400000-0300)\/"
                },
                "PossuiBebe":true,
                "RecusarEnvioDoEmailParaFornecedor":true,
                "RecusarEnvioDoTelefoneParaFornecedor":true,
                "Redress":"String content",
                "ServicosAuxiliares":[{
                    "Assento":"String content",
                    "IdentificadorUnico":"String content",
                    "Peso":12678967.543233,
                    "ServicoAuxiliarItem":[{
                        "Codigo":"String content",
                        "Moeda":"String content",
                        "Quantidade":2147483647,
                        "Referencia":"String content",
                        "Valor":12678967.543233
                    }],
                    "Tipo":2147483647,
                    "Trecho":"String content",
                    "UnidadeMedida":"String content"
                }],
                "Sexo":"String content",
                "SmilesGol":"String content",
                "Sobrenome":"String content",
                "TaxaAssento":12678967.543233,
                "TaxaBagagem":12678967.543233,
                "Telefone":{
                    "Id":2147483647,
                    "Cidade":"String content",
                    "Email":"String content",
                    "Endereco":"String content",
                    "NumeroDDD":"String content",
                    "NumeroDDI":"String content",
                    "NumeroTelefone":"String content",
                    "Nome":"String content",
                    "Tipo":0
                },
                "Tipo":"String content",
                "VoeBiz":"String content"
            }],
            "RetornarDadosSessao":true,
            "TarifarMelhorFamilia":true,
            "TarifarMelhorPreco":true,
            "ViagensMultiplas":[{
                "IdentificacaoDaViagem":"String content"
            }]
        ]; */
        return [];
    }
}
