

DELIMITER //
CREATE PROCEDURE geraRecibo(in id_placa int,in id_cliente int, in frase varchar(250), in altura real, in largura real, in data_entrega date)
BEGIN
    SELECT p.altura * p.largura INTO @area FROM placa p WHERE p.id = id_placa; 
    SELECT @area * 147.30 INTO @custo_material;
    SELECT length(p.frase) INTO @aux FROM placa p WHERE p.id = id_placa;
    SELECT @aux * 0.32 INTO @custo_desenho;
    SELECT @custo_material + @custo_desenho INTO @valor_placa;
    SELECT ROUND(RAND(), 2)  INTO @sinal;

    SELECT @area;
    SELECT @custo_material;
    SELECT @aux;
    SELECT @custo_desenho;
    SELECT @sinal;

    INSERT INTO recibo(id, data_entrega, valor_placa, valor_sinal, id_cliente, id_placa)
        VALUES(null, data_entrega, (SELECT @valor_placa), (SELECT @sinal), id_cliente, id_placa);
END //
DELIMITER ;



DELIMITER //
CREATE TRIGGER gerarRecibo AFTER INSERT ON placa
FOR EACH ROW
BEGIN
    CALL geraRecibo(new.id, new.id_cliente, new.frase, new.altura, new.largura, new.data_entrega)
END //
DELIMITER ;