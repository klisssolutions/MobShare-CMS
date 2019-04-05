USE mydb;

SELECT * FROM Nivel;


SELECT * FROM funcionario;

SELECT * FROM cliente;

SELECT * FROM usuario_Web;

SELECT * FROM pendencia;

SELECT * FROM veiculo;

SELECT * FROM endereco;

SELECT * FROM categoria_Veiculo;
SELECT * FROM tipo_Veiculo;
SELECT * FROM pendencia_veiculo;



create view VPendencia_Cliente as SELECT p.idPendencia, c.nome, c.idCliente AS id, p.motivo, p.aberto AS pendente from  pendencia_cliente as pc join cliente as c on pc.idCliente = c.idCliente join pendencia as p on p.idpendencia = pc.idPendencia;
    
create view VPendencia_Veiculo as SELECT p.idPendencia, concat(v.marca, " ", v.modelo) AS nome, v.idVeiculo as id, p.motivo as motivo, p.aberto as pendente from pendencia_veiculo as pv join veiculo as v on pv.idVeiculo = v.idVeiculo join pendencia as p on p.idpendencia = pv.idPendencia;	 

/*
delimiter #
create trigger tgPendencia_Cadastro_Cliente after insert
on Cliente FOR EACH ROW 
begin 

	declare x as int;

	
    insert into pendencia (motivo, aberto) values('Aguardando confirmação do cadastro', 1);
    
    insert into pendencia_cliente (idpendencia, idCliente) values(select max(idPendencia) from Pendencia, );

end#
delimiter;
*/

SELECT * FROM VPendencia_Cliente;
SELECT * FROM VPendencia_Veiculo;

DROP VIEW VPendencia_Veiculo;
DROP VIEW VPendencia_Cliente;