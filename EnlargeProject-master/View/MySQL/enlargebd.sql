/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Adans
 * Created: 16 de jun. de 2021
 */

--ENLARGEBD FINAL

--
-- NOME DO BANCO: `enlargebd`
--

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `id_perfil` int(11) NOT NULL,
  `ds_perfil` varchar(255) NOT NULL
);

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`id_perfil`, `ds_perfil`) VALUES
(1, 'Administrador'),
(2, 'Funcionario');

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `ds_nome` varchar(80) NOT NULL,
  `nr_telefone` varchar(20) DEFAULT NULL,
  `ds_email` varchar(80) DEFAULT NULL,
  `ds_senha` varchar(255) NOT NULL,
  `nr_cpf` varchar(14) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL
);

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `ds_nome`, `nr_telefone`, `ds_email`, `ds_senha`, `nr_cpf`, `id_perfil`) VALUES
(16, 'Victor Machado', '11964460318', 'victor.silva147@fatec.sp.gov.br', 'f109462a25588697b997cbf6bf1b3670', '46540933894', 1),
(17, 'Luna Maria', '11986610677', 'luna@email.com', 'd1aa72f9cae9ff4a4377fc58a5ae2fe9', '48142918846', 2),
(19, 'Victor machado', '11977633941', 'victormlobo@hotmail.com', '123', '333333333333', NULL);

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_fk_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `id_fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `tb_perfil` (`id_perfil`);


---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--


CREATE TABLE `tb_servicos` (
  `id_servico` INTEGER(5) NOT NULL,
  `ds_nome_servico` varchar(180) NOT NULL,
  `dt_criacao_data` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `criado_por` VARCHAR(80) DEFAULT CURRENT_USER,
  `ds_cidade` varchar(100) NOT NULL,
  `nr_idade_minima` int(2) DEFAULT NULL,
  `nr_idade_maxima` int(2) DEFAULT NULL,
  `dt_janela_viagem_inicio` date NOT NULL,
  `dt_janela_viagem_fim` date NOT NULL,
  `ds_dias_semana` VARCHAR(50) DEFAULT NULL,
  `nr_deadline` INT(2) NOT NULL,
  `fg_exige_pickup` tinyint(1) NOT NULL,
  `fg_ativo` tinyint(1) NOT NULL,
  `ds_descricao_servico` longTEXT DEFAULT NULL,
  `nr_quantidade_loteamento` int(5) DEFAULT NULL,
  `nr_valor_unitario` double DEFAULT NULL,
  `nr_qt_min_passageiros` int(2) NOT NULL,
  `fg_privativo` tinyint(1) NOT NULL
);


--
-- Índices para tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD PRIMARY KEY (`id_servico`);
  
  
--
-- AUTO_INCREMENT de tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


--
-- Estrutura da tabela `tb_tarifarios`
--

CREATE TABLE `tb_tarifarios` ( 
    `id_servico` INT(8) NOT NULL , 
    `cod_tarifario` INT(10) NOT NULL AUTO_INCREMENT , 
    `nome_tarifario` VARCHAR(180) NOT NULL , 
    `ativo` BOOLEAN NOT NULL , 
    `qtdeAllotment` INT(2),
    `data_servico` DATE, PRIMARY KEY (`cod_tarifario`)
);

ALTER TABLE tb_tarifarios ADD CONSTRAINT fk_servico FOREIGN KEY (id_servico) REFERENCES tb_servicos (id_servico);


CREATE TABLE tb_reservas (
    num_reserva INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cod_tarifario INT(10) NOT NULL,
    data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_servico DATE,
    nome_titular VARCHAR(80) NOT NULL,
    idade_titular INT(2) NOT NULL,
    nome_pax1 VARCHAR(80),
    idade_pax1 INT(2),
    qtde_pax INT(2) NOT NULL,
    info_voo_htl VARCHAR(80),
    status_reserva VARCHAR(80) NOT NULL,
    valor_total float(8,2)
);

ALTER TABLE tb_reservas ADD CONSTRAINT fk_tarifario FOREIGN KEY (cod_tarifario) REFERENCES tb_tarifarios (cod_tarifario);

--
COMMIT;

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

--
--Novos ajustes no Banco de Dados
--

ALTER TABLE tb_reservas CHANGE nome_pax1 idade_junior INT(2);
ALTER TABLE tb_reservas CHANGE idade_pax1 idade_senior INT(2);

ALTER TABLE tb_reservas ADD COLUMN horario VARCHAR(20) AFTER data_servico;
ALTER TABLE tb_reservas ADD COLUMN nome_servico VARCHAR(180) AFTER cod_tarifario;

ALTER TABLE tb_tarifarios ADD COLUMN valor_unitario float(8,2);

--
--Tabela para os tokens autorizados
--
CREATE TABLE tokens_autorizados (
    id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    token VARCHAR(180), 
    status VARCHAR(10)
);

INSERT INTO tokens_autorizados (token, status) VALUES ('cf538b25-2c6f-4121-a3aa-4c4e02f5fac7', 'S');

--
--Triggers e procedures
--

--Procedure pra popular os tarifários
DELIMITER $$
CREATE OR REPLACE PROCEDURE PR_tb_tarifarios (nome VARCHAR(180), allot INT, twI DATE, twF DATE)
BEGIN
    DECLARE max_serv INT;
    DECLARE v_diferenca INT;
    DECLARE vlrUnit float(8,2);
	
    select max(id_servico) into max_serv from tb_servicos;
    SELECT nr_valor_unitario INTO vlrUnit FROM tb_servicos WHERE id_servico = max_serv;
		
    SELECT ABS(DATEDIFF(dt_janela_viagem_fim, dt_janela_viagem_inicio)) INTO v_diferenca
    FROM tb_servicos
    WHERE id_servico = max_serv;
		
	set @num = 0;
	
	WHILE @num <= v_diferenca DO
		insert into tb_tarifarios (id_servico, nome_tarifario, qtdeAllotment, data_servico, ativo, valor_unitario)
		VALUES (max_serv, CONCAT(CONVERT(DATE_FORMAT(DATE_ADD(twI, INTERVAL @num DAY), "%d/%m/%Y"), CHAR), ' ', nome), allot, DATE_ADD(twI, INTERVAL @num DAY), true, vlrUnit);
		set @num = @num + 1;
	END WHILE;
END $$


--Procedure para o allotment
DELIMITER $$
CREATE OR REPLACE PROCEDURE PR_ALLOTMENT(qtdePax int, codTar int, numRes int)

BEGIN

	DECLARE allot INT;
	DECLARE vlrUnit FLOAT(8,2);
	DECLARE dataTarif DATE;
	DECLARE nomServ VARCHAR(180);
	DECLARE `negative` CONDITION FOR SQLSTATE '45000';
    
	select qtdeAllotment into allot from tb_tarifarios where cod_tarifario = codTar;
	SELECT valor_unitario INTO vlrUnit FROM tb_tarifarios WHERE cod_tarifario = codTar;
	SELECT data_servico INTO dataTarif FROM tb_tarifarios WHERE cod_tarifario = codTar; 
	SELECT nome_tarifario INTO nomServ FROM tb_tarifarios WHERE cod_tarifario = codTar;
	
	
	IF (qtdePax > allot) THEN
		SIGNAL `negative`
		SET MESSAGE_TEXT = 'Sem disponibilidade!';
	END IF;
	
	update tb_tarifarios
	set qtdeAllotment = (allot - qtdePax)
	where cod_tarifario = codTar;
	
	update tb_reservas
	set valor_total = (vlrUnit * qtdePax), data_servico = dataTarif, status_reserva = 'Confirmada', nome_servico = SUBSTR(nomServ, 11)
	where cod_tarifario = codTar AND num_reserva = numRes;
	
END $$


--Trigger de reservas
DELIMITER $$
CREATE OR REPLACE TRIGGER allotmentTrigger
BEFORE INSERT ON tb_reservas 
FOR EACH ROW
BEGIN
	
	DECLARE allot INT(2);
    DECLARE `negative` CONDITION FOR SQLSTATE '45001';
	DECLARE `semIdadeMinima` CONDITION FOR SQLSTATE '45002';
	DECLARE `semQtdeNecessaria` CONDITION FOR SQLSTATE '45003';
	DECLARE idadeMin INT(2);
	DECLARE qtdeMin INT (2);
	
	SELECT qtdeAllotment into allot FROM tb_tarifarios WHERE cod_tarifario = NEW.cod_tarifario;
	
	SELECT s.nr_idade_minima INTO idadeMin FROM tb_servicos s 
	JOIN tb_tarifarios t ON (s.id_servico = t.id_servico)
	WHERE cod_tarifario = NEW.cod_tarifario;
	
	SELECT s.nr_qt_min_passageiros INTO qtdeMin FROM tb_servicos s 
	JOIN tb_tarifarios t ON (s.id_servico = t.id_servico)
	WHERE cod_tarifario = NEW.cod_tarifario;
	
	
	IF (NEW.qtde_pax > allot) THEN
		SIGNAL `negative`
		SET MESSAGE_TEXT = 'Sem disponibilidade!';
	END IF;
	
	IF (NEW.idade_junior < idadeMin) THEN
		SIGNAL `semIdadeMinima`
		SET MESSAGE_TEXT = 'Passageiro sem a idade minima exigida!';
	END IF;
	
	IF (NEW.qtde_pax < qtdeMin) THEN
		SIGNAL `semQtdeNecessaria`
		SET MESSAGE_TEXT = 'Quantidade de passageiros menor que a exigida!';
	END IF;
	
	
END;
$$