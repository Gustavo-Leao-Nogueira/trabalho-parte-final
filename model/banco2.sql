CREATE TABLE cliente (
  id serial NOT NULL,
  nome varchar(150) NOT NULL,
  telefone INTEGER NOT NULL
);

CREATE TABLE placa (
  id serial NOT NULL,
  altura float NOT NULL,
  largura float NOT NULL,
  cor_fundo varchar(150) NOT NULL,
  cor_texto varchar(150) NOT NULL,
  id_cliente integer NOT NULL,
  frase varchar(300) NOT NULL,
  data_entrega date DEFAULT current_date
);

CREATE TABLE recibo (
  id serial NOT NULL,
  data_entrega date NOT NULL,
  valor_placa float NOT NULL,
  valor_sinal float NOT NULL,
  id_cliente INTEGER NOT NULL,
  id_placa INTEGER NOT NULL
);

ALTER TABLE cliente
  ADD PRIMARY KEY (id);

ALTER TABLE placa
  ADD PRIMARY KEY (id);

ALTER TABLE recibo
  ADD PRIMARY KEY (id);

ALTER TABLE placa 
ADD CONSTRAINT fk_cliente_placa FOREIGN KEY (id_cliente) REFERENCES cliente (id);


ALTER TABLE recibo 
ADD CONSTRAINT fk_cliente_recibo FOREIGN KEY (id_cliente) REFERENCES cliente (id);

ALTER TABLE recibo
ADD CONSTRAINT fk_cliente_placa FOREIGN KEY (id_placa) REFERENCES placa (id);




CREATE FUNCTION geraRecibo(id_placa int,id_cliente int, frase varchar(250), altura real, largura real, data_entrega date)
RETURNS setof AS $$
DECLARE resposta boolean;
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

    select INSERT INTO recibo(id, data_entrega, valor_placa, valor_sinal, id_cliente, id_placa)
        VALUES(null, data_entrega, (SELECT @valor_placa), (SELECT @sinal), id_cliente, id_placa)
        into @resposta;

        RETURN resposta;

END;
$$ LANGUAGE 'sql';