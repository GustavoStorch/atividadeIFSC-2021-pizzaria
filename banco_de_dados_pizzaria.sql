create database pizzaria;

use pizzaria;

CREATE TABLE ultpedido (
  pedido INT(11) NOT NULL,
  PRIMARY KEY (pedido)
);

CREATE TABLE pizzas (
  codigo INT(11) NOT NULL,
  nome VARCHAR(30) NULL,
  descricao VARCHAR(100) NULL,
  valor DECIMAL(5,2) NULL,
  PRIMARY KEY (codigo)
);

CREATE TABLE pedidos (
  numero INT(11) NOT NULL,
  seq INT(11) NOT NULL,
  pizzas_codigo INT(11) NOT NULL,
  PRIMARY KEY (numero, seq),
  INDEX fk_pedidos_pizzas_idx (pizzas_codigo ASC) VISIBLE,
  CONSTRAINT fk_pedidos_pizzas
    FOREIGN KEY (pizzas_codigo)
    REFERENCES pizzas (codigo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

insert into pizzas values (1, '4 Queijos', 'Queijos de vários sabores', 7.55),
(2, 'Vegetariana', 'Vegetais a gosto', 6.31);

show tables;
select * from pedidos;
select * from pizzas;
select * from ultpedido;