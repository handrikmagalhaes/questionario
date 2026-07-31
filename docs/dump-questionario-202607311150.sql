--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

-- Started on 2026-07-31 11:50:10

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
-- TOC entry 2907 (class 0 OID 0)
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
-- TOC entry 2908 (class 0 OID 0)
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
-- TOC entry 2909 (class 0 OID 0)
-- Dependencies: 198
-- Name: periciando_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.periciando_id_seq OWNED BY public.periciando.id;


--
-- TOC entry 212 (class 1259 OID 16846)
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
-- TOC entry 211 (class 1259 OID 16844)
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
-- TOC entry 2910 (class 0 OID 0)
-- Dependencies: 211
-- Name: pericias_loas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pericias_loas_id_seq OWNED BY public.pericias_loas.id;


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
-- TOC entry 2911 (class 0 OID 0)
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
-- TOC entry 2912 (class 0 OID 0)
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
    lesao text,
    impedimento_longo_prazo character varying,
    doenca_cronica character varying,
    exercer_atos character varying,
    exercicio_pleno character varying,
    permanentes_cuidados character varying,
    desenvolvimento_fisico_mental character varying,
    prejudica_exercicio_atividade character varying,
    esfoco_fisico character varying,
    documento_escolar character varying,
    impedir_atividade character varying
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
-- TOC entry 2913 (class 0 OID 0)
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
-- TOC entry 2914 (class 0 OID 0)
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
-- TOC entry 2915 (class 0 OID 0)
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
-- TOC entry 2916 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2727 (class 2604 OID 16697)
-- Name: pericia_anexos_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.pericia_anexos_sisperjud_id_seq'::regclass);


--
-- TOC entry 2723 (class 2604 OID 16664)
-- Name: periciando id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando ALTER COLUMN id SET DEFAULT nextval('public.periciando_id_seq'::regclass);


--
-- TOC entry 2734 (class 2604 OID 16849)
-- Name: pericias_loas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_loas ALTER COLUMN id SET DEFAULT nextval('public.pericias_loas_id_seq'::regclass);


--
-- TOC entry 2724 (class 2604 OID 16678)
-- Name: pericias_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.pericias_sisperjud_id_seq'::regclass);


--
-- TOC entry 2729 (class 2604 OID 16724)
-- Name: resposta id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta ALTER COLUMN id SET DEFAULT nextval('public.resposta_id_seq'::regclass);


--
-- TOC entry 2733 (class 2604 OID 16769)
-- Name: resposta_loas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas ALTER COLUMN id SET DEFAULT nextval('public.resposta_loas_id_seq'::regclass);


--
-- TOC entry 2731 (class 2604 OID 16751)
-- Name: resposta_sisperjud id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN id SET DEFAULT nextval('public.resposta_sisperjud_id_seq'::regclass);


--
-- TOC entry 2732 (class 2604 OID 16752)
-- Name: resposta_sisperjud resposta_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud ALTER COLUMN resposta_id SET DEFAULT nextval('public.resposta_sisperjud_resposta_id_seq'::regclass);


--
-- TOC entry 2722 (class 2604 OID 16471)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 2890 (class 0 OID 16694)
-- Dependencies: 203
-- Data for Name: pericia_anexos_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericia_anexos_sisperjud (id, pericia_id, titulo_anexo, arquivo_anexo, enviado_em) FROM stdin;
\.


--
-- TOC entry 2886 (class 0 OID 16661)
-- Dependencies: 199
-- Data for Name: periciando; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.periciando (id, nome_periciando, cpf_periciando, rg_periciando, nascimento_periciando, nome_social_periciando, sexo_biologico_periciando, identidade_genero_periciando, raca_periciando, estado_civil_periciando, grau_escolaridade_periciando, profissao_periciando, uf_periciando, formacao_periciando, outras_formacoes_periciando) FROM stdin;
1	sdasdasdasd	342.342.342-34	adasd	2026-06-16	fdgsdfgdfg	Feminino	Gênero não-binário	Preta	Solteiro(a)	Sem escolaridade	sdfsdfgsdf	PA	sdfsdfsdf	sdfsdfsf
5	Handrik	889.573.304-53	654654	1980-11-01	jklhjkhjkjk	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	 jklhjkhjkjk	AC	jkhkhjk	 kjkljkljkl
8	Handrik	889.573.304-54	654654	1980-11-01	jklhjkhjkjk	Feminino	Mulher Cisgênerio	Amarela	Solteiro(a)	Sem escolaridade	 jklhjkhjkjk	AC	jkhkhjk	 kjkljkljkl
\.


--
-- TOC entry 2899 (class 0 OID 16846)
-- Dependencies: 212
-- Data for Name: pericias_loas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericias_loas (id, numero_processo, data_pericia, medico_perito, nome_periciando, profissao_periciando, profissoes_exercidas, endereco_periciando, data_nascimento_periciando, sexo_periciando, naturalidade_periciando, rg_periciando, cpf_periciando, estado_civil_periciando, grau_instrucao, tempo_sem_trabalhar, pessoas_mesmo_teto, queixa_principal, lesao, impedimento_longo_prazo, doenca_cronica, exercer_atos, exercicio_pleno, permanentes_cuidados, desenvolvimento_fisico_mental, prejudica_exercicio_atividade, esforco_fisico, documento_escolar, impedir_atividade, diagnostico_autor, impedimento_menor, natureza_impedimento, capacidade_vida, data_inicio_enfermidade, data_inicio_impedimento, data_cessacao_impedimento, complementacao, medico_judicial) FROM stdin;
2	23041.000255/2026-01	2026-07-28	João Palmeira Neto	Handrik Palmeira Magalhães	Servidor Público Federal	Programador de Computadores	Avenida Roberto Simonsen, 950, Ap. 104, Gruta de Lourdes, Maceió/AL, CEP: 57052-675	1972-09-16	Masculino	Maceió/AL	853860	889.573.304-53	Casado(a)	Ensino Superior Completo	1 ano	1	Dor de coluna	çlkçlçlkçl	çlkçlkçlk	çlkçkçlk	çlkçlkçl	çlkçlkçl	çlkçlçlk						Lombar	Sim, de forma permanente	Física	Sim	2026-01-01	2026-05-01	2027-01-01	Não há	José dos Santos
\.


--
-- TOC entry 2888 (class 0 OID 16675)
-- Dependencies: 201
-- Data for Name: pericias_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pericias_sisperjud (id, numero_processo, juizo_juizado, natureza, perito, crm, data_pericia, periciando_id, local_pericia, paciente, comparecimento, telemedicina, atividade_laboral, outras_atividades, reabilitacao, tratamento_mantido, afastamento, historia_clinica, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, estado_clinico_exame, limitacoes_funcionais, afastamento_exame, fisica_mental_exame, realizando_tratamento_exame, beneficio_previdenciario_exame, documentos_acesso_exame, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais, data_conclusao, medico_perito, criado_em, atualizado_em) FROM stdin;
3	23041.056842/2026-01	lkhljhjklh	HAHAHAH	khkjhkjh	08978789	2026-07-21	5	.mjçkljçkljçkljklkl	Não	Sim	Sim	knljknbjkjkbnjk	njklnnjkn	Não	Não	Não	jkbnjkljkbnjklbkjbjk	Não	Não	Não	dfgdfhdfbhd	mçmnljbnjbkbjfuvjvjhv	Faz porra nenhuma	\N	\N	\N	\N	\N	Não	Sim	Não	Nada a declarar	Não se aplica	dfgdfbfdbgb	Sim	Não teve	Mais nada	Nada	2026-07-21	João Palmeira Neto	2026-07-20 09:36:09.942109-03	2026-07-20 09:36:09.942109-03
\.


--
-- TOC entry 2892 (class 0 OID 16721)
-- Dependencies: 205
-- Data for Name: resposta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta (id, resposta, tipo_pericia) FROM stdin;
16	Torsão de Tornozelo	SISPERJUD
17	Resposa LOAS menor	LOAS
18	Resposta LOAS maior	LOAS
\.


--
-- TOC entry 2897 (class 0 OID 16766)
-- Dependencies: 210
-- Data for Name: resposta_loas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_loas (id, resposta_id, menor, lesao, impedimento_longo_prazo, doenca_cronica, exercer_atos, exercicio_pleno, permanentes_cuidados, desenvolvimento_fisico_mental, prejudica_exercicio_atividade, esfoco_fisico, documento_escolar, impedir_atividade) FROM stdin;
5	17	Sim							Teste 1	Teste 2	Teste 4	Teste 5	\N
6	18	Não	Teste 1	Teste 2	Teste 3	Teste 4	Teste 5	Teste 6					\N
\.


--
-- TOC entry 2895 (class 0 OID 16748)
-- Dependencies: 208
-- Data for Name: resposta_sisperjud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.resposta_sisperjud (id, resposta_id, estado_clinico, limitacoes_funcionais, afastamento, fisica_mental, realizando_tratamento, beneficio_previdenciario, documentos_acesso, lesao_fisica_mental, respondeu_sozinha, valores_atrasados, informacoes_valores, alteracao_incapacidade, informacoes_pos_pericia, conclusao_laudo, laudo_diverso, outros_esclarecimentos, quesitos_adicionais) FROM stdin;
7	16	Fudido	Faz porra nenhuma	Não	Sim	Não	Sim	Não	Não	Sim	Não	Nada a declarar	Não se aplica	\N	Sim	Não teve	Mais nada	Nada
\.


--
-- TOC entry 2884 (class 0 OID 16468)
-- Dependencies: 197
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, email_usuario, senha_usuario, nome_usuario) FROM stdin;
1	handrikmagalhaes@gmail.com	$2y$10$Y1ryWdbaEIVvRGTRVCBBgecbKijXjT4OeEPE9LC7xuE5C.kLr8oJK	Handrik Palmeira Magalhães
3	tyronepm@gmail.com	$2y$10$RuuU4jvZhXIvDN/.1TgSLeH1hantHgfUNDTZPWP38VFyiNit9A/Ju	Tyrone Palmeira Magalhães
\.


--
-- TOC entry 2917 (class 0 OID 0)
-- Dependencies: 202
-- Name: pericia_anexos_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericia_anexos_sisperjud_id_seq', 1, false);


--
-- TOC entry 2918 (class 0 OID 0)
-- Dependencies: 198
-- Name: periciando_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.periciando_id_seq', 11, true);


--
-- TOC entry 2919 (class 0 OID 0)
-- Dependencies: 211
-- Name: pericias_loas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericias_loas_id_seq', 2, true);


--
-- TOC entry 2920 (class 0 OID 0)
-- Dependencies: 200
-- Name: pericias_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pericias_sisperjud_id_seq', 3, true);


--
-- TOC entry 2921 (class 0 OID 0)
-- Dependencies: 204
-- Name: resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_id_seq', 20, true);


--
-- TOC entry 2922 (class 0 OID 0)
-- Dependencies: 209
-- Name: resposta_loas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_loas_id_seq', 6, true);


--
-- TOC entry 2923 (class 0 OID 0)
-- Dependencies: 206
-- Name: resposta_sisperjud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_id_seq', 7, true);


--
-- TOC entry 2924 (class 0 OID 0)
-- Dependencies: 207
-- Name: resposta_sisperjud_resposta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.resposta_sisperjud_resposta_id_seq', 1, false);


--
-- TOC entry 2925 (class 0 OID 0)
-- Dependencies: 196
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 3, true);


--
-- TOC entry 2749 (class 2606 OID 16703)
-- Name: pericia_anexos_sisperjud pericia_anexos_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud
    ADD CONSTRAINT pericia_anexos_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2740 (class 2606 OID 16669)
-- Name: periciando periciado_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando
    ADD CONSTRAINT periciado_pk PRIMARY KEY (id);


--
-- TOC entry 2742 (class 2606 OID 16671)
-- Name: periciando periciado_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.periciando
    ADD CONSTRAINT periciado_unique UNIQUE (cpf_periciando);


--
-- TOC entry 2757 (class 2606 OID 16854)
-- Name: pericias_loas pericias_loas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_loas
    ADD CONSTRAINT pericias_loas_pk PRIMARY KEY (id);


--
-- TOC entry 2746 (class 2606 OID 16685)
-- Name: pericias_sisperjud pericias_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud
    ADD CONSTRAINT pericias_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2755 (class 2606 OID 16774)
-- Name: resposta_loas resposta_loas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_pk PRIMARY KEY (id);


--
-- TOC entry 2751 (class 2606 OID 16730)
-- Name: resposta resposta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta
    ADD CONSTRAINT resposta_pkey PRIMARY KEY (id);


--
-- TOC entry 2753 (class 2606 OID 16758)
-- Name: resposta_sisperjud resposta_sisperjud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT resposta_sisperjud_pkey PRIMARY KEY (id);


--
-- TOC entry 2736 (class 2606 OID 16473)
-- Name: usuario usuarios_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_pk PRIMARY KEY (id);


--
-- TOC entry 2738 (class 2606 OID 16478)
-- Name: usuario usuarios_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuarios_unique UNIQUE (email_usuario);


--
-- TOC entry 2747 (class 1259 OID 16704)
-- Name: idx_anexos_pericia; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_anexos_pericia ON public.pericia_anexos_sisperjud USING btree (pericia_id);


--
-- TOC entry 2744 (class 1259 OID 16691)
-- Name: idx_pericias_processo; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_pericias_processo ON public.pericias_sisperjud USING btree (numero_processo);


--
-- TOC entry 2743 (class 1259 OID 16672)
-- Name: periciando_nome_periciando_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX periciando_nome_periciando_idx ON public.periciando USING btree (nome_periciando);


--
-- TOC entry 2759 (class 2606 OID 16705)
-- Name: pericia_anexos_sisperjud fk_pericia; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericia_anexos_sisperjud
    ADD CONSTRAINT fk_pericia FOREIGN KEY (pericia_id) REFERENCES public.pericias_sisperjud(id) ON DELETE CASCADE;


--
-- TOC entry 2760 (class 2606 OID 16759)
-- Name: resposta_sisperjud fk_resposta; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_sisperjud
    ADD CONSTRAINT fk_resposta FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON DELETE CASCADE;


--
-- TOC entry 2758 (class 2606 OID 16686)
-- Name: pericias_sisperjud pericias_sisperjud_periciando_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pericias_sisperjud
    ADD CONSTRAINT pericias_sisperjud_periciando_fk FOREIGN KEY (periciando_id) REFERENCES public.periciando(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2761 (class 2606 OID 16780)
-- Name: resposta_loas resposta_loas_resposta_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.resposta_loas
    ADD CONSTRAINT resposta_loas_resposta_fk FOREIGN KEY (resposta_id) REFERENCES public.resposta(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2026-07-31 11:50:10

--
-- PostgreSQL database dump complete
--

