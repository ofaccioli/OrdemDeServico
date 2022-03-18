<?php

/*

* Criando e exportando planilhas do Excel

* http://blog.thiagobelem.net/

*/

include("config/banco.php"); 

// Definimos o nome do arquivo que será exportado

$arquivo = 'solicitacoes_de_pagamento.xls';

 

// Criamos uma tabela HTML com o formato da planilha

$sql = 'select r.*, f.Nome_fornecedor, c.Nome_colaborador, d.Nome_departamento from departamento d inner join colaborador c on d.Cod_Departamento = c.Cod_departamento inner join requisicao r on c.Cod_colaborador = r.Cod_colaborador inner join fornecedor f on r.Cod_fornecedor = f.Cod_fornecedor order by Cod_requisicao desc';

$query = mysqli_query($conexao, $sql);

$html = '
	<table border="1" bordercolor="#000000">
		<tr bgcolor="#FFFF99" style="font-weight: bold; font-size: 16" valign="middle">
			<th>
				Código
			</th>
			<th>
				Colaborador
			</th>
			<th>
				Departamento
			</th>
			<th>
				Fornecedor
			</th>
			<th>
				Natureza
			</th>
			<th>
				Orçado
			</th>
			<th>
				Orçamento
			</th>
			<th>
				Justificativa
			</th>
			<th>
				Doc. Origem
			</th>
			<th>
				Número
			</th>
			<th>
				Pagamento
			</th>
			<th>
				Vencimento
			</th>
			<th>
				Parcelas
			</th>
			<th>
				Descrição
			</th>
			<th>
				Valor Total
			</th>
			<th>
				Forma de Pagamento
			</th>
			<th>
				Favorecido
			</th>
			<th>
				Banco
			</th>
			<th>
				Agência
			</th>
			<th>
				Conta
			</th>
			<th>
				Cnpj
			</th>
			<th>
				Observações
			</th>
			<th>
				Data
			</th>
			<th>
				Hora
			</th>
		</tr>
';

while($sql = mysqli_fetch_array($query)){

	if($sql["Orcado"] == 0){$orcado = "Sim";}else{$orcado = "Não";};
	
	if($sql["Pgto"] == 0){$pgto = "A Vista";}else{$pgto = "Parcelado";};
	
	$html .= '
		<tr valign="middle">
			<td>
				'.$sql["Cod_requisicao"].'
			</td>
			<td>
				'.$sql["Nome_colaborador"].'
			</td>
			<td>
				'.$sql["Nome_departamento"].'
			</td>
			<td>
				'.$sql["Nome_fornecedor"].'
			</td>
			<td>
				'.$sql["Natureza"].'
			</td>
			<td>
				'.$orcado.'
			</td>
			<td>
				'.$sql["Orcamento"].'
			</td>
			<td>
				'.$sql["Justificativa"].'
			</td>
			<td>
				'.$sql["Natur_doc_origem"].'
			</td>
			<td>
				'.$sql["Numero"].'
			</td>
			<td>
				'.$pgto.'
			</td>
			<td>
				'.$sql["Vencimento"].'
			</td>
			<td>
				'.$sql["Qtde_parcelas"].'
			</td>
			<td>
				'.$sql["Descricao"].'
			</td>
			<td>
				'.$sql["Total"].'
			</td>
			<td>
				'.$sql["Forma_pgto"].'
			</td>
			<td>
				'.$sql["Favorecido"].'
			</td>
			<td>
				'.$sql["Banco"].'
			</td>
			<td>
				'.$sql["Agencia"].'
			</td>
			<td>
				'.$sql["Conta"].'
			</td>
			<td>
				'.$sql["Cnpj"].'
			</td>
			<td>
				'.$sql["Observacoes"].'
			</td>
			<td>
				'.$sql["Data"].'
			</td>
			<td>
				'.$sql["Hora"].'
			</td>
		</tr>
	';

}

$html .= '
	</table>
';

 

// Configurações header para forçar o download

header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");

header ("Cache-Control: no-cache, must-revalidate");

header ("Pragma: no-cache");

header ("Content-type: application/x-msexcel");

header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );

header ("Content-Description: PHP Generated Data" );

 

// Envia o conteúdo do arquivo

echo $html;

exit;

 

?>
