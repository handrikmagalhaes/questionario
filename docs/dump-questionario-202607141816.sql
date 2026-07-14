--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

-- Started on 2026-07-14 18:16:40

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
-- TOC entry 2895 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 203 (class 1259 OID 16694)
-- Name: pericia_anexos_sisperjud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pericia_anexos_sisperjud (
    id bigint NOT NULL,
    pericia_id bigint NOT NULL,
    titulo_anexo character varying(255) NOT NULL,
    arquivo_anexo character varying(512) NOT NULL,
    enviado_em timestamp with time zone DEFAULT now()
);


ALTER TABLE public.pericia_anexos_sisperjud OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16692)
-- Name: pericia_anexos_sisperjud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pericia_anexos_sisperjud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pericia_anexos_sisperjud_id_seq OWNER TO postgres;

--
-- TOC entry 2896 (class 0 OID 0)
-- Dependencies: 202
-- Name: pericia_anexos_sisperjud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pericia_anexos_sisperjud_id_seq OWNED BY public.pericia_anexos_sisperjud.id;


--
-- TOC entry 199 (class 1259 OID 16661)
-- Name: periciando; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.periciando (
    id integer NOT NULL,
    nome_periciando character varying NOT NULL,
    cpf_periciando character varying NOT NULL,
    rg_periciando character varying,
    nascimento_periciando date NOT NULL,
    nome_social_periciando character varying,
    sexo_biologico_periciando character varying NOT NULL,
    identidade_genero_periciando character varying NOT NULL,
    raca_periciando character varying NOT NULL,
    estado_civil_periciando character varying NOT NULL,
    grau_escolaridade_periciando character varying,
    profissao_periciando character varying NOT NULL,
    uf_periciando character varying NOT NULL,
    formacao_periciando character varying,
    outras_formacoes_periciando character varying
);


ALTER TABLE public.periciando OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16659)
-- Name: periciando_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.periciando_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.periciando_id_seq OWNER TO postgres;

--
-- TOC entry 2897 (class 0 OID 0)
-- Dependencies: 198
-- Name: periciando_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.periciando_id_seq OWNED BY public.periciando.id;


--
-- TOC entry 201 (class 1259 OID 16675)
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
    periciando_id bigint NOT NULL,
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
    estado_clinico_exame text NOT NULL,
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
    outros_esclarecimentos text NOT NULL,
    quesitos_adicionais text NOT NULL,
    data_conclusao date NOT NULL,
    medico_perito character varying(255) NOT NULL,
    criado_em timestamp with time zone DEFAULT now(),
    atualizado_em timestamp with time zone DEFAULT now()
);


ALTER TABLE public.pericias_sisperjud OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16673)
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
-- TOC entry 2898 (class 0 OID 0)
-- Dependencies: 200
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pericias_sisperjud_id_seq OWNED BY public.pericias_sisperjud.id;


--
-- TOC entry 205 (class 1259 OID 16721)
-- Name: resposta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.resposta (
    id integer NOT NULL,
    resposta character varying NOT NULL,
    tipo_pericia character varying DEFAULT false NOT NULL
);


ALTER TABLE public.resposta OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16719)
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
-- TOC entry 2899 (class 0 OID 0)
-- Dependencies: 204
-- Name: resposta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_id_seq OWNED BY public.resposta.id;


--
-- TOC entry 210 (class 1259 OID 16766)
-- Name: resposta_loas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.resposta_loas (
    id integer NOT NULL,
    resposta_id integer NOT NULL,
    menor character varying NOT NULL,
    portador_lesao_deficiencia text,
    molestia_lesao character varying,
    doenca_infectocontagiosa character varying,
    exercer_plenamente character varying,
    impedimento_transitorio_permanente character varying,
    cuidados_medicos character varying,
    prejudica_desenvolvimento character varying,
    prejudica_atividades character varying,
    quadro_clinico character varying,
    documento_escolar character varying,
    sustento_familiar character varying
);


ALTER TABLE public.resposta_loas OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16764)
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
-- TOC entry 2900 (class 0 OID 0)
-- Dependencies: 209
-- Name: resposta_loas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_loas_id_seq OWNED BY public.resposta_loas.id;


--
-- TOC entry 208 (class 1259 OID 16748)
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
-- TOC entry 206 (class 1259 OID 16744)
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
-- TOC entry 2901 (class 0 OID 0)
-- Dependencies: 206
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.resposta_sisperjud_id_seq OWNED BY public.resposta_sisperjud.id;


--
-- TOC entry 207 (class 1259 OID 16746)
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
-- TOC entry 2902 (class 0 OID 0)
-- Dependencies: 207
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
-- TOC entry 2903 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2720 (class 2604 OID 16697)
-- Name: pericia_anexos_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.pericia_anexos_sisperjud_id_seq'::regclass);


--
-- TOC entry 2716 (class 2604 OID 16664)
-- Name: periciando id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando ALTER COLUMN id SET DEFAULT nextval('public.periciando_id_seq'::regclass);


--
-- TOC entry 2717 (class 2604 OID 16678)
-- Name: pericias_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.pericias_sisperjud_id_seq'::regclass);


--
-- TOC entry 2722 (class 2604 OID 16724)
-- Name: resposta id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta ALTER COLUMN id SET DEFAULT nextval('public.resposta_id_seq'::regclass);


--
-- TOC entry 2726 (class 2604 OID 16769)
-- Name: resposta_loas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas ALTER COLUMN id SET DEFAULT nextval('public.resposta_loas_id_seq'::regclass);


--
-- TOC entry 2724 (class 2604 OID 16751)
-- Name: resposta_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.resposta_sisperjud_id_seq'::regclass);


--
-- TOC entry 2725 (class 2604 OID 16752)
-- Name: resposta_sisperjud resposta_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN resposta_id SET DEFAULT nextval('public.resposta_sisperjud_resposta_id_seq'::regclass);


--
-- TOC entry 2715 (class 2604 OID 16471)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 2880 (class 0 OID 16694)
-- Dependencies: 203
-- Data for Name: pericia_anexos_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericia_anexos_sisperjud (id, pericia_id, titulo_anexo, arquivo_anexo, enviado_em) FROM stdin;
\.


--
-- TOC entry 2876 (class 0 OID 16661)
-- Dependencies: 199
-- Data for Name: periciando; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.periciando (id, nome_periciando, cpf_periciando, rg_periciando, nascimento_periciando, nome_social_periciando, sexo_biologico_periciando, identidade_genero_periciando, raca_periciando, estado_civil_periciando, grau_escolaridade_periciando, profissao_periciando, uf_periciando, formacao_periciando, outras_formacoes_periciando) FROM stdin;
1	sdasdasdasd	342.342.342-34	adasd	2026-06-16	fdgsdfgdfg	Feminino	Gênero não-binário	Preta	Solteiro(a)	Sem escolaridade	sdfsdfgsdf	PA	sdfsdfsdf	sdfsdfsf
5	Handrik	889.573.304-53	654654	1980-11-01	jklhjkhjkjk	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	 jklhjkhjkjk	AC	jkhkhjk	 kjkljkljkl
8	Handrik	889.573.304-54	654654	1980-11-01	jklhjkhjkjk	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	 jklhjkhjkjk	AC	jkhkhjk	 kjkljkljkl
\.


--
-- TOC entry 2878 (class 0 OID 16675)
-- Dependencies: 201
-- Data for Name: pericias_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericias_sisperjud (id, numero_processo, juizo_juizado, natureza, perito, crm, data_pericia, periciando_id, local_pericia, paciente, comparecimento, telemedicina, atividade_laboral, outras_atividades, reabilitacao, tratamento_mantido, afastamento, historia_clinica, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, estado_clinico_exame, limitacoes_funcionais, afastamento_exame, fisica_mental_exame, realizando_tratamento_exame, beneficio_previdenciario_exame, documentos_acesso_exame, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais, data_conclusao, medico_perito, criado_em, atualizado_em) FROM stdin;
2	23041.542154/5125-45	vjkvjkh	hjvhjvhj	jhvhjvhj	6564	2026-07-14	5	lkjnlkjn	Não	Não	Não	kmlkljmkl	çjlkbjkbjk	Não	Não	Não	ljnhklnjkkj	Não	Não	Não	kljnlknlnlknl	jkacjkkaskhak	Faz porra nenhuma	\N	\N	\N	\N	\N	Não	Sim	Não	Nada a declarar	Não se aplica	fdbdfgd	Sim	Não teve	Mais nada	Nada	2026-07-14	hkbjkgjhjjj	2026-07-14 18:05:17.398529-03	2026-07-14 18:05:17.398529-03
\.


--
-- TOC entry 2882 (class 0 OID 16721)
-- Dependencies: 205
-- Data for Name: resposta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta (id, resposta, tipo_pericia) FROM stdin;
16	Torsão de Tornozelo	SISPERJUD
17	Resposa LOAS menor	LOAS
18	Resposta LOAS maior	LOAS
\.


--
-- TOC entry 2887 (class 0 OID 16766)
-- Dependencies: 210
-- Data for Name: resposta_loas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_loas (id, resposta_id, menor, portador_lesao_deficiencia, molestia_lesao, doenca_infectocontagiosa, exercer_plenamente, impedimento_transitorio_permanente, cuidados_medicos, prejudica_desenvolvimento, prejudica_atividades, quadro_clinico, documento_escolar, sustento_familiar) FROM stdin;
5	17	Sim							Teste 1	Teste 2	Teste 3	Teste 4	Teste 5
6	18	Não	Teste 1	Teste 2	Teste 3	Teste 4	Teste 5	Teste 6					
\.


--
-- TOC entry 2885 (class 0 OID 16748)
-- Dependencies: 208
-- Data for Name: resposta_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_sisperjud (id, resposta_id, estado_clinico, limitacoes_funcionais, afastamento, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais) FROM stdin;
7	16	Fudido	Faz porra nenhuma	Não	Sim	Não	Sim	Não	Não	Sim	Não	Nada a declarar	Não se aplica	\N	Sim	Não teve	Mais nada	Nada
\.


--
-- TOC entry 2874 (class 0 OID 16468)
-- Dependencies: 197
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, email_usuario, senha_usuario, nome_usuario) FROM stdin;
1	handrikmagalhaes@gmail.com	$2y$10$Y1ryWdbaEIVvRGTRVCBBgecbKijXjT4OeEPE9LC7xuE5C.kLr8oJK	Handrik Palmeira Magalhães
3	tyronepm@gmail.com	$2y$10$RuuU4jvZhXIvDN/.1TgSLeH1hantHgfUNDTZPWP38VFyiNit9A/Ju	Tyrone Palmeira Magalhães
\.


--
-- TOC entry 2904 (class 0 OID 0)
-- Dependencies: 202
-- Name: pericia_anexos_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericia_anexos_sisperjud_id_seq', 1, false);


--
-- TOC entry 2905 (class 0 OID 0)
-- Dependencies: 198
-- Name: periciando_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.periciando_id_seq', 10, true);


--
-- TOC entry 2906 (class 0 OID 0)
-- Dependencies: 200
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericias_sisperjud_id_seq', 2, true);


--
-- TOC entry 2907 (class 0 OID 0)
-- Dependencies: 204
-- Name: resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_id_seq', 18, true);


--
-- TOC entry 2908 (class 0 OID 0)
-- Dependencies: 209
-- Name: resposta_loas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_loas_id_seq', 6, true);


--
-- TOC entry 2909 (class 0 OID 0)
-- Dependencies: 206
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_id_seq', 7, true);


--
-- TOC entry 2910 (class 0 OID 0)
-- Dependencies: 207
-- Name: resposta_sisperjud_resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_resposta_id_seq', 1, false);


--
-- TOC entry 2911 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- TOC entry 2741 (class 2606 OID 16703)
-- Name: pericia_anexos_sisperjud pericia_anexos_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud
    ADD CONSTRAINT pericia_anexos_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2732 (class 2606 OID 16669)
-- Name: periciando periciado_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando
    ADD CONSTRAINT periciado_pk PRIMARY KEY (id);


--
-- TOC entry 2734 (class 2606 OID 16671)
-- Name: periciando periciado_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando
    ADD CONSTRAINT periciado_unique UNIQUE (cpf_periciando);


--
-- TOC entry 2738 (class 2606 OID 16685)
-- Name: pericias_sisperjud pericias_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud
    ADD CONSTRAINT pericias_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2747 (class 2606 OID 16774)
-- Name: resposta_loas resposta_loas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_pk PRIMARY KEY (id);


--
-- TOC entry 2743 (class 2606 OID 16730)
-- Name: resposta resposta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta
    ADD CONSTRAINT resposta_pkey PRIMARY KEY (id);


--
-- TOC entry 2745 (class 2606 OID 16758)
-- Name: resposta_sisperjud resposta_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT resposta_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2728 (class 2606 OID 16473)
-- Name: usuario usuarios_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_pk PRIMARY KEY (id);


--
-- TOC entry 2730 (class 2606 OID 16478)
-- Name: usuario usuarios_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_unique UNIQUE (email_usuario);


--
-- TOC entry 2739 (class 1259 OID 16704)
-- Name: idx_anexos_pericia; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_anexos_pericia ON public.pericia_anexos_sisperjud USING btree (pericia_id);


--
-- TOC entry 2736 (class 1259 OID 16691)
-- Name: idx_pericias_processo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_pericias_processo ON public.pericias_sisperjud USING btree (numero_processo);


--
-- TOC entry 2735 (class 1259 OID 16672)
-- Name: periciando_nome_periciando_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX periciando_nome_periciando_idx ON public.periciando USING btree (nome_periciando);


--
-- TOC entry 2749 (class 2606 OID 16705)
-- Name: pericia_anexos_sisperjud fk_pericia; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud
    ADD CONSTRAINT fk_pericia FOREIGN KEY (pericia_id) REFERENCES public.pericias_sisperjud(id) ON DELETE CASCADE;


--
-- TOC entry 2750 (class 2606 OID 16759)
-- Name: resposta_sisperjud fk_resposta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT fk_resposta FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON DELETE CASCADE;


--
-- TOC entry 2748 (class 2606 OID 16686)
-- Name: pericias_sisperjud pericias_sisperjud_periciando_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud
    ADD CONSTRAINT pericias_sisperjud_periciando_fk FOREIGN KEY (periciando_id) REFERENCES public.periciando(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2751 (class 2606 OID 16780)
-- Name: resposta_loas resposta_loas_resposta_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_resposta_fk FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2026-07-14 18:16:40

--
-- PostgreSQL database dump complete
--

