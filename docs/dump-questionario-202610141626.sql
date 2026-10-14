--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

-- Started on 2026-10-14 16:26:24

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2876 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 206 (class 1259 OID 16846)
-- Name: pericias_loas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pericias_loas (
    id integer NOT NULL,
    numero_processo character varying NOT NULL,
    data_pericia date NOT NULL,
    medico_perito character varying NOT NULL,
    nome_periciando character varying NOT NULL,
    profissao_periciando character varying NOT NULL,
    profissoes_exercidas character varying NOT NULL,
    endereco_periciando character varying NOT NULL,
    data_nascimento_periciando date NOT NULL,
    sexo_periciando character varying NOT NULL,
    naturalidade_periciando character varying NOT NULL,
    rg_periciando character varying,
    cpf_periciando character varying,
    estado_civil_periciando character varying NOT NULL,
    grau_instrucao character varying NOT NULL,
    tempo_sem_trabalhar character varying,
    pessoas_mesmo_teto character varying NOT NULL,
    queixa_principal character varying NOT NULL,
    lesao character varying NOT NULL,
    impedimento_longo_prazo character varying NOT NULL,
    doenca_cronica character varying NOT NULL,
    exercer_atos character varying,
    exercicio_pleno character varying NOT NULL,
    permanentes_cuidados character varying NOT NULL,
    desenvolvimento_fisico_mental character varying NOT NULL,
    prejudica_exercicio_atividade character varying NOT NULL,
    esforco_fisico character varying,
    documento_escolar character varying NOT NULL,
    impedir_atividade character varying NOT NULL,
    diagnostico_autor character varying NOT NULL,
    impedimento_menor character varying NOT NULL,
    natureza_impedimento character varying NOT NULL,
    capacidade_vida character varying NOT NULL,
    data_inicio_enfermidade date,
    data_inicio_impedimento date,
    data_cessacao_impedimento date,
    complementacao character varying NOT NULL,
    medico_judicial character varying NOT NULL
);


ALTER TABLE public.pericias_loas OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16844)
-- Name: pericias_loas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pericias_loas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pericias_loas_id_seq OWNER TO postgres;

--
-- TOC entry 2877 (class 0 OID 0)
-- Dependencies: 205
-- Name: pericias_loas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pericias_loas_id_seq OWNED BY public.pericias_loas.id;


--
-- TOC entry 208 (class 1259 OID 16874)
-- Name: pericias_sisperjud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pericias_sisperjud (
    id bigint NOT NULL,
    numero_processo character varying(50) NOT NULL,
    juizo_juizado character varying(255) NOT NULL,
    natureza character varying(255) NOT NULL,
    perito character varying(255) NOT NULL,
    crm character varying(50) NOT NULL,
    data_pericia date NOT NULL,
    nome_periciando character varying NOT NULL,
    cpf_periciando character varying NOT NULL,
    rg_periciando character varying,
    nascimento_periciando date NOT NULL,
    nome_social character varying,
    sexo_biologico character varying NOT NULL,
    identidade_genero character varying NOT NULL,
    raca character varying NOT NULL,
    estado_civil character varying NOT NULL,
    grau_escolaridade character varying,
    profissao character varying NOT NULL,
    uf character varying NOT NULL,
    formacao character varying,
    outras_formacoes character varying,
    local_pericia character varying(255),
    paciente character varying(50),
    comparecimento character varying(50),
    telemedicina character varying(50),
    atividade_laboral character varying(255) NOT NULL,
    outras_atividades character varying(255) NOT NULL,
    reabilitacao character varying(50),
    tratamento_mantido character varying(50),
    afastamento character varying(50),
    historia_clinica text NOT NULL,
    fisica_mental character varying(50),
    realizando_tratamento character varying(50),
    beneficio_previdenciario character varying(50),
    documentos_acesso text NOT NULL,
    estado_clinico text NOT NULL,
    limitacoes_funcionais text NOT NULL,
    afastamento_exame character varying(50),
    fisica_mental_exame character varying(50),
    realizando_tratamento_exame character varying(50),
    beneficio_previdenciario_exame character varying(50),
    documentos_acesso_exame text,
    lesao_fisica_mental character varying(50),
    respondeu_sozinha character varying(50),
    valores_atrasados character varying(50),
    informacoes_valores text NOT NULL,
    alteracao_incapacidade character varying(50),
    informacoes_pos_pericia text NOT NULL,
    conclusao_laudo character varying(50),
    laudo_diverso text NOT NULL,
    outros_esclarecimentos text,
    quesitos_adicionais text,
    anexos text,
    data_conclusao date NOT NULL,
    medico_perito character varying(255) NOT NULL,
    criado_em timestamp with time zone DEFAULT now(),
    atualizado_em timestamp with time zone DEFAULT now()
);


ALTER TABLE public.pericias_sisperjud OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16872)
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pericias_sisperjud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pericias_sisperjud_id_seq OWNER TO postgres;

--
-- TOC entry 2878 (class 0 OID 0)
-- Dependencies: 207
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pericias_sisperjud_id_seq OWNED BY public.pericias_sisperjud.id;


--
-- TOC entry 199 (class 1259 OID 16721)
-- Name: resposta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.resposta (
    id integer NOT NULL,
    resposta character varying NOT NULL,
    tipo_pericia character varying DEFAULT false NOT NULL
);


ALTER TABLE public.resposta OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16719)
-- Name: resposta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.resposta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resposta_id_seq OWNER TO postgres;

--
-- TOC entry 2879 (class 0 OID 0)
-- Dependencies: 198
-- Name: resposta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_id_seq OWNED BY public.resposta.id;


--
-- TOC entry 204 (class 1259 OID 16766)
-- Name: resposta_loas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.resposta_loas (
    id integer NOT NULL,
    resposta_id integer NOT NULL,
    menor character varying NOT NULL,
    lesao text,
    impedimento_longo_prazo character varying,
    doenca_cronica character varying,
    exercer_atos character varying,
    exercicio_pleno character varying,
    permanentes_cuidados character varying,
    desenvolvimento_fisico_mental character varying,
    prejudica_exercicio_atividade character varying,
    esforco_fisico character varying,
    documento_escolar character varying,
    impedir_atividade character varying
);


ALTER TABLE public.resposta_loas OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16764)
-- Name: resposta_loas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.resposta_loas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resposta_loas_id_seq OWNER TO postgres;

--
-- TOC entry 2880 (class 0 OID 0)
-- Dependencies: 203
-- Name: resposta_loas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_loas_id_seq OWNED BY public.resposta_loas.id;


--
-- TOC entry 202 (class 1259 OID 16748)
-- Name: resposta_sisperjud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.resposta_sisperjud (
    id integer NOT NULL,
    resposta_id integer NOT NULL,
    estado_clinico text NOT NULL,
    limitacoes_funcionais text NOT NULL,
    afastamento character varying(50),
    fisica_mental character varying(50),
    realizando_tratamento character varying(50),
    beneficio_previdenciario character varying(50),
    documentos_acesso text,
    lesao_fisica_mental character varying(50),
    respondeu_sozinha character varying(50),
    valores_atrasados character varying(50),
    informacoes_valores text,
    alteracao_incapacidade character varying(50),
    informacoes_pos_pericia text,
    conclusao_laudo character varying(50),
    laudo_diverso text,
    outros_esclarecimentos text,
    quesitos_adicionais text
);


ALTER TABLE public.resposta_sisperjud OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16744)
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.resposta_sisperjud_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resposta_sisperjud_id_seq OWNER TO postgres;

--
-- TOC entry 2881 (class 0 OID 0)
-- Dependencies: 200
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_sisperjud_id_seq OWNED BY public.resposta_sisperjud.id;


--
-- TOC entry 201 (class 1259 OID 16746)
-- Name: resposta_sisperjud_resposta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.resposta_sisperjud_resposta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resposta_sisperjud_resposta_id_seq OWNER TO postgres;

--
-- TOC entry 2882 (class 0 OID 0)
-- Dependencies: 201
-- Name: resposta_sisperjud_resposta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_sisperjud_resposta_id_seq OWNED BY public.resposta_sisperjud.resposta_id;


--
-- TOC entry 197 (class 1259 OID 16468)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    email_usuario character varying NOT NULL,
    senha_usuario character varying NOT NULL,
    nome_usuario character varying NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16466)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 2883 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2714 (class 2604 OID 16849)
-- Name: pericias_loas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_loas ALTER COLUMN id SET DEFAULT nextval('public.pericias_loas_id_seq'::regclass);


--
-- TOC entry 2715 (class 2604 OID 16877)
-- Name: pericias_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.pericias_sisperjud_id_seq'::regclass);


--
-- TOC entry 2709 (class 2604 OID 16724)
-- Name: resposta id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta ALTER COLUMN id SET DEFAULT nextval('public.resposta_id_seq'::regclass);


--
-- TOC entry 2713 (class 2604 OID 16769)
-- Name: resposta_loas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas ALTER COLUMN id SET DEFAULT nextval('public.resposta_loas_id_seq'::regclass);


--
-- TOC entry 2711 (class 2604 OID 16751)
-- Name: resposta_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.resposta_sisperjud_id_seq'::regclass);


--
-- TOC entry 2712 (class 2604 OID 16887)
-- Name: resposta_sisperjud resposta_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN resposta_id SET DEFAULT nextval('public.resposta_sisperjud_resposta_id_seq'::regclass);


--
-- TOC entry 2708 (class 2604 OID 16471)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 2866 (class 0 OID 16846)
-- Dependencies: 206
-- Data for Name: pericias_loas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericias_loas (id, numero_processo, data_pericia, medico_perito, nome_periciando, profissao_periciando, profissoes_exercidas, endereco_periciando, data_nascimento_periciando, sexo_periciando, naturalidade_periciando, rg_periciando, cpf_periciando, estado_civil_periciando, grau_instrucao, tempo_sem_trabalhar, pessoas_mesmo_teto, queixa_principal, lesao, impedimento_longo_prazo, doenca_cronica, exercer_atos, exercicio_pleno, permanentes_cuidados, desenvolvimento_fisico_mental, prejudica_exercicio_atividade, esforco_fisico, documento_escolar, impedir_atividade, diagnostico_autor, impedimento_menor, natureza_impedimento, capacidade_vida, data_inicio_enfermidade, data_inicio_impedimento, data_cessacao_impedimento, complementacao, medico_judicial) FROM stdin;
2	23041.000255/2026-01	2026-07-28	João Palmeira Neto	Handrik Palmeira Magalhães	Servidor Público Federal	Programador de Computadores	Avenida Roberto Simonsen, 950, Ap. 104, Gruta de Lourdes, Maceió/AL, CEP: 57052-675	1972-09-16	Masculino	Maceió/AL	853860	889.573.304-53	Casado(a)	Ensino Superior Completo	1 ano	1	Dor de coluna	çlkçlçlkçl	çlkçlkçlk	çlkçkçlk	çlkçlkçl	çlkçlkçl	çlkçlçlk						Lombar	Sim, de forma permanente	Física	Sim	2026-01-01	2026-05-01	2027-01-01	Não há	José dos Santos
\.


--
-- TOC entry 2868 (class 0 OID 16874)
-- Dependencies: 208
-- Data for Name: pericias_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericias_sisperjud (id, numero_processo, juizo_juizado, natureza, perito, crm, data_pericia, nome_periciando, cpf_periciando, rg_periciando, nascimento_periciando, nome_social, sexo_biologico, identidade_genero, raca, estado_civil, grau_escolaridade, profissao, uf, formacao, outras_formacoes, local_pericia, paciente, comparecimento, telemedicina, atividade_laboral, outras_atividades, reabilitacao, tratamento_mantido, afastamento, historia_clinica, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, estado_clinico, limitacoes_funcionais, afastamento_exame, fisica_mental_exame, realizando_tratamento_exame, beneficio_previdenciario_exame, documentos_acesso_exame, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais, anexos, data_conclusao, medico_perito, criado_em, atualizado_em) FROM stdin;
2	23040.002542/2154-21	kladklksajl	kljlkjklj	lkjlkjlk	lkjlkjkl	2026-09-08	çlkçlkçlkçl	546.565.564-56	çlkçlkçl	1985-02-02	jkjkhkhkj	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	çlkçljkçljklj	AC	kljljlkjkljkl	ljhkjhjkhjk	jkhjkkghhkg	Não	Não	Não	 çljkçkljçkljkl	lkjkljkl	Não	Não	Não	çkljlkjkljkl	Não	Não	Não	kljkljklhlhljhlj	Teste	Teste	\N	\N	\N	\N	\N	Não	Não	Não	Teste	Não	Teste	Não	Teste	Teste	Teste	sadswdfsdfsdf	2026-09-08	dfbdfghfgngthjn	2026-09-08 13:04:29.725328-03	2026-09-08 13:04:29.725328-03
1	23040.056215/8454-54	çlçklljkhjln	klnlnklnlk	çklmnlkmçlmçklm	5465465465	2026-09-09	Handrik Palmeira	454.566.546-54	gyjufuyggui	1972-09-16	ljkljhjkjkljkh	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	çjkljlkjljkl	AC	lkj	kljkljlkjlkjkl	ukohkuhuihyu	Não	Não	Não	kljlkjkljkljklj	lkjkljkljklj	Não	Não	Não	kmkljkljkljkl	Não	Não	Não	kljlkjkljlkjkljkl	çkljkljkljkljkl	kljlkjkljkljklj	\N	\N	\N	\N	\N	Não	Não	Não	kljkljlkjkljkl	Não	çkljkljkljklj	Não	 kljkljlkkljkl	 jkhjkhjkhjk	jklhjklhjklhjk	jkhjkhjkhjkhjkh	2026-09-09	khghjghjghjghjghjg	2026-08-03 09:29:31.36186-03	2026-08-03 09:29:31.36186-03
\.


--
-- TOC entry 2859 (class 0 OID 16721)
-- Dependencies: 199
-- Data for Name: resposta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta (id, resposta, tipo_pericia) FROM stdin;
38	Resposta teste 2	SISPERJUD
42	Teste LOAS Menor	LOAS
\.


--
-- TOC entry 2864 (class 0 OID 16766)
-- Dependencies: 204
-- Data for Name: resposta_loas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_loas (id, resposta_id, menor, lesao, impedimento_longo_prazo, doenca_cronica, exercer_atos, exercicio_pleno, permanentes_cuidados, desenvolvimento_fisico_mental, prejudica_exercicio_atividade, esforco_fisico, documento_escolar, impedir_atividade) FROM stdin;
8	42	Sim							Teste Menor	Teste Menor	Teste Menor	Teste Menor	Teste Menor
\.


--
-- TOC entry 2862 (class 0 OID 16748)
-- Dependencies: 202
-- Data for Name: resposta_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_sisperjud (id, resposta_id, estado_clinico, limitacoes_funcionais, afastamento, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais) FROM stdin;
9	38	Teste	Teste	Não	Não	Não	Não	Teste	Não	Não	Não	Teste	Não	Teste	Não	Teste	Teste	Teste
\.


--
-- TOC entry 2857 (class 0 OID 16468)
-- Dependencies: 197
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, email_usuario, senha_usuario, nome_usuario) FROM stdin;
1	handrikmagalhaes@gmail.com	$2y$10$Y1ryWdbaEIVvRGTRVCBBgecbKijXjT4OeEPE9LC7xuE5C.kLr8oJK	Handrik Palmeira Magalhães
3	tyronepm@gmail.com	$2y$10$RuuU4jvZhXIvDN/.1TgSLeH1hantHgfUNDTZPWP38VFyiNit9A/Ju	Tyrone Palmeira Magalhães
\.


--
-- TOC entry 2884 (class 0 OID 0)
-- Dependencies: 205
-- Name: pericias_loas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericias_loas_id_seq', 2, true);


--
-- TOC entry 2885 (class 0 OID 0)
-- Dependencies: 207
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericias_sisperjud_id_seq', 2, true);


--
-- TOC entry 2886 (class 0 OID 0)
-- Dependencies: 198
-- Name: resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_id_seq', 42, true);


--
-- TOC entry 2887 (class 0 OID 0)
-- Dependencies: 203
-- Name: resposta_loas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_loas_id_seq', 8, true);


--
-- TOC entry 2888 (class 0 OID 0)
-- Dependencies: 200
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_id_seq', 9, true);


--
-- TOC entry 2889 (class 0 OID 0)
-- Dependencies: 201
-- Name: resposta_sisperjud_resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_resposta_id_seq', 1, true);


--
-- TOC entry 2890 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- TOC entry 2729 (class 2606 OID 16854)
-- Name: pericias_loas pericias_loas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_loas
    ADD CONSTRAINT pericias_loas_pk PRIMARY KEY (id);


--
-- TOC entry 2732 (class 2606 OID 16884)
-- Name: pericias_sisperjud pericias_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud
    ADD CONSTRAINT pericias_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2727 (class 2606 OID 16774)
-- Name: resposta_loas resposta_loas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_pk PRIMARY KEY (id);


--
-- TOC entry 2723 (class 2606 OID 16730)
-- Name: resposta resposta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta
    ADD CONSTRAINT resposta_pkey PRIMARY KEY (id);


--
-- TOC entry 2725 (class 2606 OID 16758)
-- Name: resposta_sisperjud resposta_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT resposta_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2719 (class 2606 OID 16473)
-- Name: usuario usuarios_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_pk PRIMARY KEY (id);


--
-- TOC entry 2721 (class 2606 OID 16478)
-- Name: usuario usuarios_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_unique UNIQUE (email_usuario);


--
-- TOC entry 2730 (class 1259 OID 16885)
-- Name: idx_pericias_processo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_pericias_processo ON public.pericias_sisperjud USING btree (numero_processo);


--
-- TOC entry 2733 (class 2606 OID 16888)
-- Name: resposta_sisperjud fk_resposta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT fk_resposta FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON DELETE CASCADE;


--
-- TOC entry 2734 (class 2606 OID 16780)
-- Name: resposta_loas resposta_loas_resposta_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_resposta_fk FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2026-10-14 16:26:25

--
-- PostgreSQL database dump complete
--

