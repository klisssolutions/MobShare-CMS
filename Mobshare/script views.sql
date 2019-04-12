use mydb;
SELECT * FROM cliente;
SELECT * FROM pendencia_cliente;

SELECT * FROM foto_veiculo;

SELECT * FROM veiculo;
SELECT * FROM modelo;
SELECT * FROM marca;
SELECT * FROM pendencia_veiculo;

CREATE VIEW VPendencia_Veiculo AS SELECT pv.idPendencia_Veiculo AS idPendencia, CONCAT(mar.nomeMarca, " ", m.nomeModelo) AS nome, v.idVeiculo AS id, pv.motivo, pv.aberto FROM pendencia_veiculo AS pv JOIN veiculo AS v ON pv.idVeiculo = v.idVeiculo join modelo AS m ON m.idModelo = v.idModelo JOIN marca AS mar ON m.idMarca = mar.idMarca;	 
CREATE VIEW VPendencia_Cliente AS SELECT p.idPendencia_Cliente AS idPendencia, c.nome, c.idCliente AS id, p.motivo, p.aberto FROM  pendencia_cliente AS p JOIN cliente AS c ON p.idCliente = c.idCliente;

SELECT * FROM VPendencia_Veiculo;
SELECT * FROM VPendencia_Cliente;

DROP VIEW VPendencia_Veiculo;
DROP VIEW VPendencia_Cliente;