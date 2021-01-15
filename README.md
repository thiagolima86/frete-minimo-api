# Frete Mínimo api
### Dados fornecidos pela a ANTT
Ultimas atualização 14/janeiro/2021

[Link do diário oficial](https://www.in.gov.br/en/web/dou/-/portaria-n-399-de-3-de-novembro-de-2020-286403617?utm_campaign=circular_n_545_-_antt_atualiza_tabela_do_piso_minimo_de_frete&utm_medium=email&utm_source=RD+Station)

URL BASE: http://api-frete-mnimo.unisystems.com.br/frete-minimo

## Lista de tabelas

* Listar todas:  `/tabelas`
* Listar uma:  `/tabelas/A`
* Exemplo: http://api-frete-mnimo.unisystems.com.br/frete-minimo/tabelas/B


## Lista de Tipos de carga

* Listar todos:  `/tipo_cargas`
* Listar uma:  `/tipo_cargas/1`

## Lista de valores para calculo de frete mínimo

* Listar todos:  `/frete`
* filtrar por tabela:  `/tipo_cargas/tabela/A`
* filtrar por tabela e tipo de carga:  `/tipo_cargas/tabela/A/tipo_carga/1`
* filtrar por tabela, tipo de carga e eixo:  `/tipo_cargas/tabela/A/tipo_carga/1/eixo/2`
* calcular frete minimo:  `/tipo_cargas/tabela/A/tipo_carga/1/eixo/2/dist/150`

observação o valor da distancia [dist] é dado em (km).
