------------------------------------------------------
-- Export file for user CSGXK@10.43.127.12/LZBDCSVR --
-- Created by dell on 2018/8/20, 16:06:42 ------------
------------------------------------------------------

set define off
spool 20180820�����1.log

prompt
prompt Creating table BLGC
prompt ===================
prompt
create table BLGC
(
  ywgcbh NVARCHAR2(36),
  ywmc   NVARCHAR2(223),
  cxmm   NVARCHAR2(20),
  sjsj   DATE,
  cnsj   DATE,
  sqr    NVARCHAR2(200),
  gczt   NVARCHAR2(20),
  wcsj   DATE
)
;
comment on table BLGC
  is 'ҵ��������';
comment on column BLGC.ywgcbh
  is 'ҵ����̱��';
comment on column BLGC.ywmc
  is 'ҵ������';
comment on column BLGC.cxmm
  is '��ѯ����';
comment on column BLGC.sjsj
  is '�ռ�ʱ��';
comment on column BLGC.cnsj
  is '��ŵʱ��';
comment on column BLGC.sqr
  is '������';
comment on column BLGC.gczt
  is '����״̬';
comment on column BLGC.wcsj
  is '���ʱ��';

prompt
prompt Creating table BLHD
prompt ===================
prompt
create table BLHD
(
  ywhdbh NVARCHAR2(36),
  ywgcbh NVARCHAR2(36),
  bzmc   NVARCHAR2(200),
  sxh    INTEGER,
  slr    NVARCHAR2(200),
  slsj   DATE,
  hdzt   NVARCHAR2(20),
  wcsj   DATE
)
;
comment on table BLHD
  is 'ҵ�����';
comment on column BLHD.ywhdbh
  is 'ҵ�����';
comment on column BLHD.ywgcbh
  is 'ҵ����̱��';
comment on column BLHD.bzmc
  is '��������';
comment on column BLHD.sxh
  is '˳���';
comment on column BLHD.slr
  is '������';
comment on column BLHD.slsj
  is '����ʱ��';
comment on column BLHD.hdzt
  is '�״̬';
comment on column BLHD.wcsj
  is '���ʱ��';

prompt
prompt Creating table C
prompt ================
prompt
create table C
(
  ch      NVARCHAR2(36) not null,
  zrzh    NVARCHAR2(24),
  ysdm    NVARCHAR2(10),
  ljzh    NVARCHAR2(36),
  sjc     NVARCHAR2(50),
  myc     NVARCHAR2(50),
  cjzmj   NUMBER(38,8),
  ctnjzmj NUMBER(38,8),
  cytmj   NUMBER(38,8),
  cgyjzmj NUMBER(38,8),
  cftjzmj NUMBER(38,8),
  cbqmj   NUMBER(38,8),
  cg      NUMBER(38,8),
  sptymj  NUMBER(38,8)
)
;
comment on table C
  is '��';
comment on column C.ch
  is '���';
comment on column C.zrzh
  is '��Ȼ����';
comment on column C.ysdm
  is 'Ҫ�ش���';
comment on column C.ljzh
  is '�߼�����';
comment on column C.sjc
  is 'ʵ�ʲ�';
comment on column C.myc
  is '�����';
comment on column C.cjzmj
  is '�㽨�����';
comment on column C.ctnjzmj
  is '�����ڽ������';
comment on column C.cytmj
  is '����̨���';
comment on column C.cgyjzmj
  is '�㹲�н������';
comment on column C.cftjzmj
  is '���̯�������';
comment on column C.cbqmj
  is '���ǽ���';
comment on column C.cg
  is '���';
comment on column C.sptymj
  is 'ˮƽͶӰ���';
alter table C
  add constraint PK_C primary key (CH);

prompt
prompt Creating table CFDJ
prompt ===================
prompt
create table CFDJ
(
  ywh    NVARCHAR2(43),
  ysdm   NVARCHAR2(40),
  bdcdyh NVARCHAR2(50),
  cfjg   NVARCHAR2(200),
  cflx   NVARCHAR2(32),
  cfwj   NVARCHAR2(256),
  cfwh   NVARCHAR2(50),
  cfqx   NVARCHAR2(100),
  cfqssj DATE,
  cfjssj DATE,
  cffw   NVARCHAR2(256),
  qxdm   NVARCHAR2(16),
  djjg   NVARCHAR2(200),
  dbr    NVARCHAR2(50),
  djsj   DATE,
  jfywh  NVARCHAR2(40),
  jfjg   NVARCHAR2(200),
  jfwj   BLOB,
  jfwh   NVARCHAR2(200),
  jfdbr  NVARCHAR2(50),
  jfdjsj DATE,
  qlqtzk NVARCHAR2(1024),
  fj     NVARCHAR2(1024),
  qszt   NVARCHAR2(2)
)
;
comment on table CFDJ
  is '���Ǽ�';
comment on column CFDJ.ywh
  is 'ҵ���';
comment on column CFDJ.ysdm
  is 'Ҫ�ش���';
comment on column CFDJ.bdcdyh
  is '��������Ԫ��';
comment on column CFDJ.cfjg
  is '������';
comment on column CFDJ.cflx
  is '�������';
comment on column CFDJ.cfwj
  is '����ļ�';
comment on column CFDJ.cfwh
  is '����ĺ�';
comment on column CFDJ.cfqx
  is '�������';
comment on column CFDJ.cfqssj
  is '�����ʼʱ��';
comment on column CFDJ.cfjssj
  is '������ʱ��';
comment on column CFDJ.cffw
  is '��ⷶΧ';
comment on column CFDJ.qxdm
  is '���ش���';
comment on column CFDJ.djjg
  is '�Ǽǻ���';
comment on column CFDJ.dbr
  is '�ǲ���';
comment on column CFDJ.djsj
  is '�Ǽ�ʱ��';
comment on column CFDJ.jfywh
  is '���ҵ���';
comment on column CFDJ.jfjg
  is '������';
comment on column CFDJ.jfwj
  is '����ļ�';
comment on column CFDJ.jfwh
  is '����ĺ�';
comment on column CFDJ.jfdbr
  is '���ǲ���';
comment on column CFDJ.jfdjsj
  is '���Ǽ�ʱ��';
comment on column CFDJ.qlqtzk
  is 'Ȩ������״��';
comment on column CFDJ.fj
  is '����';
comment on column CFDJ.qszt
  is 'Ȩ��״̬';

prompt
prompt Creating table DJTSGL
prompt =====================
prompt
create table DJTSGL
(
  glbm   NVARCHAR2(55),
  ywh    NVARCHAR2(45),
  bdclx  NVARCHAR2(36),
  bdcid  NVARCHAR2(40),
  bdcdyh NVARCHAR2(36),
  djzl   NVARCHAR2(36),
  cssj   DATE,
  qszt   NVARCHAR2(2),
  xsqsrq DATE,
  xsjzrq DATE,
  fdgjlx NVARCHAR2(8)
)
;
comment on table DJTSGL
  is '�Ǽ�ͼ������';
comment on column DJTSGL.glbm
  is '��������';
comment on column DJTSGL.ywh
  is 'ҵ���';
comment on column DJTSGL.bdclx
  is '����������';
comment on column DJTSGL.bdcid
  is '������ID';
comment on column DJTSGL.bdcdyh
  is '��������Ԫ��';
comment on column DJTSGL.djzl
  is '�Ǽ�����';
comment on column DJTSGL.cssj
  is '����ʱ��';
comment on column DJTSGL.qszt
  is 'Ȩ��״̬';
comment on column DJTSGL.xsqsrq
  is '������ʼ����';
comment on column DJTSGL.xsjzrq
  is '���۽�ֹ����';
comment on column DJTSGL.fdgjlx
  is '���عҽ�����';

prompt
prompt Creating table DYAQ
prompt ===================
prompt
create table DYAQ
(
  ywh       NVARCHAR2(40),
  ysdm      NVARCHAR2(10),
  bdcdyh    NVARCHAR2(50),
  dybdclx   NVARCHAR2(36),
  dyr       NVARCHAR2(2000),
  dyfs      NVARCHAR2(2),
  djlx      NVARCHAR2(128),
  djyy      NVARCHAR2(128),
  zjjzwzl   NVARCHAR2(200),
  zjjzwdyfw NVARCHAR2(1024),
  bdbzzqse  NUMBER(38,8),
  zwlxqx    NVARCHAR2(100),
  zwlxqssj  DATE,
  zwlxjssj  DATE,
  zgzqqdss  NVARCHAR2(1024),
  zgzqse    NUMBER(38,8),
  zxdyywh   NVARCHAR2(20),
  zxdyyy    NVARCHAR2(128),
  zxsj      DATE,
  bdcdjzmh  NVARCHAR2(1024),
  qxdm      NVARCHAR2(16),
  djjg      NVARCHAR2(200),
  dbr       NVARCHAR2(50),
  djsj      DATE,
  qlqtzk    NVARCHAR2(1024),
  fj        NVARCHAR2(1024),
  qszt      NVARCHAR2(2),
  dylx      NVARCHAR2(64)
)
;
comment on table DYAQ
  is '��ѺȨ';
comment on column DYAQ.ywh
  is 'ҵ���';
comment on column DYAQ.ysdm
  is 'Ҫ�ش���';
comment on column DYAQ.bdcdyh
  is '��������Ԫ��';
comment on column DYAQ.dybdclx
  is '����������';
comment on column DYAQ.dyr
  is '��Ѻ��';
comment on column DYAQ.dyfs
  is '��Ѻ��ʽ';
comment on column DYAQ.djlx
  is '�Ǽ�����';
comment on column DYAQ.djyy
  is '�Ǽ�ԭ��';
comment on column DYAQ.zjjzwzl
  is '�ڽ�����������';
comment on column DYAQ.zjjzwdyfw
  is '�ڽ��������Ѻ��Χ';
comment on column DYAQ.bdbzzqse
  is '��������ծȨ����';
comment on column DYAQ.zwlxqx
  is 'ծ����������';
comment on column DYAQ.zwlxqssj
  is 'ծ��������ʼʱ��';
comment on column DYAQ.zwlxjssj
  is 'ծ�����н���ʱ��';
comment on column DYAQ.zgzqqdss
  is '���ծȨȷ����ʵ';
comment on column DYAQ.zgzqse
  is '���ծȨ����';
comment on column DYAQ.zxdyywh
  is 'ע����Ѻҵ���';
comment on column DYAQ.zxdyyy
  is 'ע����Ѻԭ��';
comment on column DYAQ.zxsj
  is 'ע��ʱ��';
comment on column DYAQ.bdcdjzmh
  is '�������Ǽ�֤����';
comment on column DYAQ.qxdm
  is '���ش���';
comment on column DYAQ.djjg
  is '�Ǽǻ���';
comment on column DYAQ.dbr
  is '�ǲ���';
comment on column DYAQ.djsj
  is '�Ǽ�ʱ��';
comment on column DYAQ.qlqtzk
  is 'Ȩ������״��';
comment on column DYAQ.fj
  is '����';
comment on column DYAQ.qszt
  is 'Ȩ��״̬';
comment on column DYAQ.dylx
  is '��Ѻ����';

prompt
prompt Creating table DYIQ
prompt ===================
prompt
create table DYIQ
(
  ywh        NVARCHAR2(36) not null,
  ysdm       NVARCHAR2(10),
  gydbdcdyh  NVARCHAR2(50),
  gydqlr     NVARCHAR2(50),
  gydqlrzjzl NVARCHAR2(2),
  gydqlrzjh  NVARCHAR2(50),
  xydbdcdyh  NVARCHAR2(50),
  xydzl      NVARCHAR2(2000),
  xydqlr     NVARCHAR2(50),
  xydqlrzjzl NVARCHAR2(2),
  xydqlrzjh  NVARCHAR2(50),
  djlx       NVARCHAR2(50),
  djyy       NVARCHAR2(128),
  dyqnr      NVARCHAR2(1024),
  bdcdjzmh   NVARCHAR2(1024),
  qlqx       NVARCHAR2(100),
  qlqssj     DATE,
  qljssj     DATE,
  qxdm       NVARCHAR2(6),
  djjg       NVARCHAR2(200),
  dbr        NVARCHAR2(50),
  djsj       DATE,
  qlqtzk     NVARCHAR2(1024),
  fj         NVARCHAR2(1024),
  qszt       NVARCHAR2(2)
)
;
comment on table DYIQ
  is '����Ȩ';
comment on column DYIQ.ywh
  is 'ҵ���';
comment on column DYIQ.ysdm
  is 'Ҫ�ش���';
comment on column DYIQ.gydbdcdyh
  is '���۵ز�������Ԫ��';
comment on column DYIQ.gydqlr
  is '���۵�Ȩ����';
comment on column DYIQ.gydqlrzjzl
  is '���۵�Ȩ����֤������';
comment on column DYIQ.gydqlrzjh
  is '���۵�Ȩ����֤����';
comment on column DYIQ.xydbdcdyh
  is '���۵ز�������Ԫ��';
comment on column DYIQ.xydzl
  is '���۵�����';
comment on column DYIQ.xydqlr
  is '���۵�Ȩ����';
comment on column DYIQ.xydqlrzjzl
  is '���۵�Ȩ����֤������';
comment on column DYIQ.xydqlrzjh
  is '���۵�Ȩ����֤����';
comment on column DYIQ.djlx
  is '�Ǽ�����';
comment on column DYIQ.djyy
  is '�Ǽ�ԭ��';
comment on column DYIQ.dyqnr
  is '����Ȩ����';
comment on column DYIQ.bdcdjzmh
  is '�������Ǽ�֤����';
comment on column DYIQ.qlqx
  is 'Ȩ������';
comment on column DYIQ.qlqssj
  is 'Ȩ����ʼʱ��';
comment on column DYIQ.qljssj
  is 'Ȩ������ʱ��';
comment on column DYIQ.qxdm
  is '���ش���';
comment on column DYIQ.djjg
  is '�Ǽǻ���';
comment on column DYIQ.dbr
  is '�ǲ���';
comment on column DYIQ.djsj
  is '�Ǽ�ʱ��';
comment on column DYIQ.qlqtzk
  is 'Ȩ������״��';
comment on column DYIQ.fj
  is '����';
comment on column DYIQ.qszt
  is 'Ȩ��״̬';
alter table DYIQ
  add constraint PK_DYIQ primary key (YWH);

prompt
prompt Creating table FDCKFXM
prompt ======================
prompt
create table FDCKFXM
(
  xmbh       NVARCHAR2(36) not null,
  xmmc       NVARCHAR2(100),
  xsmc       NVARCHAR2(100),
  qxh        NVARCHAR2(36),
  xmdz       NVARCHAR2(200),
  fdckfqymc  NVARCHAR2(100),
  fdckfqybh  NVARCHAR2(36),
  kprq       DATE,
  rzrq       DATE,
  sldh       NVARCHAR2(50),
  sldz       NVARCHAR2(200),
  tdsyqzh    NVARCHAR2(50),
  tddj       NVARCHAR2(16),
  ghyt       NVARCHAR2(16),
  zts        INTEGER,
  zjzmj      NUMBER(38,8),
  szfw       NVARCHAR2(200),
  zdmj       NUMBER(38,8),
  zrzs       INTEGER,
  dqksts     INTEGER,
  dqksmj     NUMBER(38,8),
  yydts      INTEGER,
  ysts       INTEGER,
  lpjj       NVARCHAR2(2000),
  sbzx       NVARCHAR2(2000),
  sgjd       NVARCHAR2(2000),
  ptss       NVARCHAR2(2000),
  zwjt       NVARCHAR2(2000),
  lhl        NVARCHAR2(100),
  rjl        NVARCHAR2(100),
  jzmd       NVARCHAR2(12),
  cwgs       INTEGER,
  jsydghxkzh NVARCHAR2(50),
  bkbh       INTEGER,
  tdtz       NUMBER(38,8),
  jhzjzmj    NUMBER(38,8),
  jhztz      NUMBER(38,8),
  jhkgsj     DATE,
  jhjgsj     DATE,
  sjwctz     NUMBER(38,8),
  sjkgsj     DATE,
  sjjgsj     DATE,
  bz         NVARCHAR2(2000),
  sjcrsj     DATE
)
;
comment on table FDCKFXM
  is '������Ŀ��';
comment on column FDCKFXM.xmbh
  is '��Ŀ���';
comment on column FDCKFXM.xmmc
  is '��Ŀ����';
comment on column FDCKFXM.xsmc
  is '��������';
comment on column FDCKFXM.qxh
  is '���غ�';
comment on column FDCKFXM.xmdz
  is '��Ŀ��ַ';
comment on column FDCKFXM.fdckfqymc
  is '���ز�������ҵ����';
comment on column FDCKFXM.fdckfqybh
  is '���ز�������ҵ���';
comment on column FDCKFXM.kprq
  is '��������';
comment on column FDCKFXM.rzrq
  is '��ס����';
comment on column FDCKFXM.sldh
  is '��¥�绰';
comment on column FDCKFXM.sldz
  is '��¥��ַ';
comment on column FDCKFXM.tdsyqzh
  is '����ʹ��Ȩ֤��';
comment on column FDCKFXM.tddj
  is '���صȼ�';
comment on column FDCKFXM.ghyt
  is '�滮��;';
comment on column FDCKFXM.zts
  is '������';
comment on column FDCKFXM.zjzmj
  is '�ܽ������';
comment on column FDCKFXM.szfw
  is '������Χ';
comment on column FDCKFXM.zdmj
  is 'ռ�����';
comment on column FDCKFXM.zrzs
  is '��Ȼ����';
comment on column FDCKFXM.dqksts
  is '��ǰ��������';
comment on column FDCKFXM.dqksmj
  is '��ǰ�������';
comment on column FDCKFXM.yydts
  is '��Ԥ������';
comment on column FDCKFXM.ysts
  is '��������';
comment on column FDCKFXM.lpjj
  is '¥�̼��';
comment on column FDCKFXM.sbzx
  is '�豸װ��';
comment on column FDCKFXM.sgjd
  is 'ʩ������';
comment on column FDCKFXM.ptss
  is '������ʩ';
comment on column FDCKFXM.zwjt
  is '��Χ��ͨ';
comment on column FDCKFXM.lhl
  is '�̻���';
comment on column FDCKFXM.rjl
  is '�ݻ���';
comment on column FDCKFXM.jzmd
  is '�����ܶ�';
comment on column FDCKFXM.cwgs
  is '��λ����';
comment on column FDCKFXM.jsydghxkzh
  is '�����õع滮���֤��';
comment on column FDCKFXM.bkbh
  is '�����';
comment on column FDCKFXM.tdtz
  is '����Ͷ��';
comment on column FDCKFXM.jhzjzmj
  is '�ƻ��ܽ������';
comment on column FDCKFXM.jhztz
  is '�ƻ���Ͷ��';
comment on column FDCKFXM.jhkgsj
  is '�ƻ�����ʱ��';
comment on column FDCKFXM.jhjgsj
  is '�ƻ�����ʱ��';
comment on column FDCKFXM.sjwctz
  is 'ʵ�����Ͷ��';
comment on column FDCKFXM.sjkgsj
  is 'ʵ�ʿ���ʱ��';
comment on column FDCKFXM.sjjgsj
  is 'ʵ�ʿ���ʱ��';
comment on column FDCKFXM.bz
  is '��ע';
comment on column FDCKFXM.sjcrsj
  is '���ݲ���ʱ��
���ݲ���ʱ��
���ݲ���ʱ��
���ݲ���ʱ��';
alter table FDCKFXM
  add constraint PK_FDCKFXM primary key (XMBH);

prompt
prompt Creating table FDCQ1
prompt ====================
prompt
create table FDCQ1
(
  ywh      NVARCHAR2(40),
  ysdm     NVARCHAR2(10),
  bdcdyh   NVARCHAR2(50),
  qllx     NVARCHAR2(32),
  djlx     NVARCHAR2(128),
  djyy     NVARCHAR2(128),
  fdzl     NVARCHAR2(2000),
  tdsyqr   NVARCHAR2(128),
  dytdmj   NUMBER(38,8),
  fttdmj   NUMBER(38,8),
  tdsyqx   NVARCHAR2(100),
  tdsyqssj DATE,
  tdsyjssj DATE,
  fdcjyjg  NUMBER(38,8),
  bdcqzh   NVARCHAR2(1024),
  qxdm     NVARCHAR2(16),
  djjg     NVARCHAR2(200),
  dbr      NVARCHAR2(50),
  djsj     DATE,
  qlqtzk   NVARCHAR2(1024),
  fj       NVARCHAR2(1024),
  fcfht    BLOB,
  qszt     NVARCHAR2(2),
  gytdmj   NUMBER(38,8)
)
;
comment on table FDCQ1
  is '���ز�Ȩ�റ';
comment on column FDCQ1.ywh
  is 'ҵ���';
comment on column FDCQ1.ysdm
  is 'Ҫ�ش���';
comment on column FDCQ1.bdcdyh
  is '��������Ԫ��';
comment on column FDCQ1.qllx
  is 'Ȩ������';
comment on column FDCQ1.djlx
  is '�Ǽ�����';
comment on column FDCQ1.djyy
  is '�Ǽ�ԭ��';
comment on column FDCQ1.fdzl
  is '��������';
comment on column FDCQ1.tdsyqr
  is '����ʹ��Ȩ��';
comment on column FDCQ1.dytdmj
  is '�����������';
comment on column FDCQ1.fttdmj
  is '��̯�������';
comment on column FDCQ1.tdsyqx
  is '����ʹ������';
comment on column FDCQ1.tdsyqssj
  is '����ʹ����ʼʱ��';
comment on column FDCQ1.tdsyjssj
  is '����ʹ�ý���ʱ��';
comment on column FDCQ1.fdcjyjg
  is '���ز����׼۸�';
comment on column FDCQ1.bdcqzh
  is '������Ȩ֤��';
comment on column FDCQ1.qxdm
  is '���ش���';
comment on column FDCQ1.djjg
  is '�Ǽǻ���';
comment on column FDCQ1.dbr
  is '�ǲ���';
comment on column FDCQ1.djsj
  is '�Ǽ�ʱ��';
comment on column FDCQ1.qlqtzk
  is 'Ȩ������״��';
comment on column FDCQ1.fj
  is '����';
comment on column FDCQ1.fcfht
  is '�����ֻ�ͼ';
comment on column FDCQ1.qszt
  is 'Ȩ��״̬';
comment on column FDCQ1.gytdmj
  is '�����������';

prompt
prompt Creating table FDCQ2
prompt ====================
prompt
create table FDCQ2
(
  ywh      NVARCHAR2(41),
  ysdm     NVARCHAR2(10),
  bdcdyh   NVARCHAR2(50),
  qllx     NVARCHAR2(32),
  djlx     NVARCHAR2(128),
  djyy     NVARCHAR2(128),
  fdzl     NVARCHAR2(2000),
  tdsyqr   NVARCHAR2(128),
  dytdmj   NUMBER(38,8),
  fttdmj   NUMBER(38,8),
  tdsyqx   NVARCHAR2(100),
  tdsyqssj DATE,
  tdsyjssj DATE,
  fdcjyjg  NUMBER(38,8),
  ghyt     NVARCHAR2(32),
  fwxz     NVARCHAR2(4),
  fwjg     NVARCHAR2(32),
  szc      NVARCHAR2(1999),
  zcs      NUMBER(15,2),
  jzmj     NUMBER(38,8),
  zyjzmj   NUMBER(38,8),
  ftjzmj   NUMBER(38,8),
  jgsj     NVARCHAR2(50),
  bdcqzh   NVARCHAR2(1024),
  qxdm     NVARCHAR2(16),
  djjg     NVARCHAR2(200),
  dbr      NVARCHAR2(50),
  djsj     DATE,
  qlqtzk   NVARCHAR2(1024),
  fj       NVARCHAR2(1024),
  qszt     NVARCHAR2(2),
  gytdmj   NUMBER(38,8),
  ytmc     NVARCHAR2(1999),
  fwxzmc   NVARCHAR2(1999)
)
;
comment on table FDCQ2
  is '���ز�Ȩ����';
comment on column FDCQ2.ywh
  is 'ҵ���';
comment on column FDCQ2.ysdm
  is 'Ҫ�ش���';
comment on column FDCQ2.bdcdyh
  is '��������Ԫ��';
comment on column FDCQ2.qllx
  is 'Ȩ������';
comment on column FDCQ2.djlx
  is '�Ǽ�����';
comment on column FDCQ2.djyy
  is '�Ǽ�ԭ��';
comment on column FDCQ2.fdzl
  is '��������';
comment on column FDCQ2.tdsyqr
  is '����ʹ��Ȩ��';
comment on column FDCQ2.dytdmj
  is '�����������';
comment on column FDCQ2.fttdmj
  is '��̯�������';
comment on column FDCQ2.tdsyqx
  is '����ʹ������';
comment on column FDCQ2.tdsyqssj
  is '����ʹ����ʼʱ��';
comment on column FDCQ2.tdsyjssj
  is '����ʹ�ý���ʱ��';
comment on column FDCQ2.fdcjyjg
  is '���ز����׼۸�';
comment on column FDCQ2.ghyt
  is '�滮��;';
comment on column FDCQ2.fwxz
  is '��������';
comment on column FDCQ2.fwjg
  is '���ݽṹ';
comment on column FDCQ2.szc
  is '���ڲ�';
comment on column FDCQ2.zcs
  is '�ܲ���';
comment on column FDCQ2.jzmj
  is '�������';
comment on column FDCQ2.zyjzmj
  is 'ר�н������';
comment on column FDCQ2.ftjzmj
  is '��̯�������';
comment on column FDCQ2.jgsj
  is '����ʱ��';
comment on column FDCQ2.bdcqzh
  is '������Ȩ֤��';
comment on column FDCQ2.qxdm
  is '���ش���';
comment on column FDCQ2.djjg
  is '�Ǽǻ���';
comment on column FDCQ2.dbr
  is '�ǲ���';
comment on column FDCQ2.djsj
  is '�Ǽ�ʱ��';
comment on column FDCQ2.qlqtzk
  is 'Ȩ������״��';
comment on column FDCQ2.fj
  is '����';
comment on column FDCQ2.qszt
  is 'Ȩ��״̬';
comment on column FDCQ2.gytdmj
  is '�����������';
comment on column FDCQ2.ytmc
  is '��;����';
comment on column FDCQ2.fwxzmc
  is '������������';

prompt
prompt Creating table FDCQ3
prompt ====================
prompt
create table FDCQ3
(
  ywh    NVARCHAR2(36) not null,
  ysdm   NVARCHAR2(10),
  bdcdyh NVARCHAR2(50),
  qllx   NVARCHAR2(2),
  jgzwbh NVARCHAR2(10),
  jgzwmc NVARCHAR2(100),
  jgzwsl INTEGER,
  jgzwmj NUMBER(38,8),
  fttdmj NUMBER(38,8),
  qxdm   NVARCHAR2(6),
  djjg   NVARCHAR2(200),
  dbr    NVARCHAR2(50),
  djsj   DATE,
  qlqtzk NVARCHAR2(1024),
  fj     NVARCHAR2(1024),
  qszt   NVARCHAR2(2)
)
;
comment on table FDCQ3
  is '���ز�Ȩ������';
comment on column FDCQ3.ywh
  is 'ҵ���';
comment on column FDCQ3.ysdm
  is 'Ҫ�ش���';
comment on column FDCQ3.bdcdyh
  is '��������Ԫ��';
comment on column FDCQ3.qllx
  is 'Ȩ������';
comment on column FDCQ3.jgzwbh
  is '��������������';
comment on column FDCQ3.jgzwmc
  is '����������������';
comment on column FDCQ3.jgzwsl
  is '����������������';
comment on column FDCQ3.jgzwmj
  is '���������������';
comment on column FDCQ3.fttdmj
  is '��̯�������';
comment on column FDCQ3.qxdm
  is '���ش���';
comment on column FDCQ3.djjg
  is '�Ǽǻ���';
comment on column FDCQ3.dbr
  is '�ǲ���';
comment on column FDCQ3.djsj
  is '�Ǽ�ʱ��';
comment on column FDCQ3.qlqtzk
  is 'Ȩ������״��';
comment on column FDCQ3.fj
  is '����';
comment on column FDCQ3.qszt
  is 'Ȩ��״̬';
alter table FDCQ3
  add constraint PK_FDCQ3 primary key (YWH);

prompt
prompt Creating table FDCQXM
prompt =====================
prompt
create table FDCQXM
(
  ywh    NVARCHAR2(36) not null,
  bdcdyh NVARCHAR2(50),
  xmmc   NVARCHAR2(200),
  zh     NVARCHAR2(200),
  zcs    NUMBER(15,2),
  ghyt   NVARCHAR2(32),
  fwjg   NVARCHAR2(32),
  jzmj   NUMBER(38,8),
  jgsj   DATE,
  zts    NUMBER(15,2),
  ytmc   NVARCHAR2(100)
)
;
comment on table FDCQXM
  is '������Ŀ�ڶറ����';
comment on column FDCQXM.ywh
  is 'ҵ���';
comment on column FDCQXM.bdcdyh
  is '��������Ԫ��';
comment on column FDCQXM.xmmc
  is '��Ŀ����';
comment on column FDCQXM.zh
  is '����';
comment on column FDCQXM.zcs
  is '�ܲ���';
comment on column FDCQXM.ghyt
  is '�滮��;';
comment on column FDCQXM.fwjg
  is '���ݽṹ';
comment on column FDCQXM.jzmj
  is '�������';
comment on column FDCQXM.jgsj
  is '����ʱ��';
comment on column FDCQXM.zts
  is '������';
comment on column FDCQXM.ytmc
  is '��;����';

prompt
prompt Creating table FDCXMGL
prompt ======================
prompt
create table FDCXMGL
(
  glbh   NVARCHAR2(36) not null,
  xmmc   NVARCHAR2(100),
  xmbh   NVARCHAR2(36),
  cyryid NVARCHAR2(36),
  glrq   DATE
)
;
comment on table FDCXMGL
  is '��Ŀ������';
comment on column FDCXMGL.glbh
  is '�������';
comment on column FDCXMGL.xmmc
  is '��Ŀ����';
comment on column FDCXMGL.xmbh
  is '��Ŀ���';
comment on column FDCXMGL.cyryid
  is '��ҵ��ԱID';
comment on column FDCXMGL.glrq
  is '��������';
alter table FDCXMGL
  add constraint PK_FDCXMGL primary key (GLBH);

prompt
prompt Creating table FZ
prompt =================
prompt
create table FZ
(
  ywh     NVARCHAR2(43),
  ysdm    NVARCHAR2(10),
  fzry    NVARCHAR2(50),
  fzsj    DATE,
  fzmc    NVARCHAR2(50),
  fzsl    NUMBER(15,2),
  hfzsh   NVARCHAR2(1024),
  lzrxm   NVARCHAR2(2000),
  lzrzjlb NVARCHAR2(50),
  lzrzjh  NVARCHAR2(200),
  lzrdh   NVARCHAR2(200),
  lzrdz   NVARCHAR2(2000),
  lzryb   NVARCHAR2(200),
  bz      NVARCHAR2(1024)
)
;
comment on table FZ
  is '��֤';
comment on column FZ.ywh
  is 'ҵ���';
comment on column FZ.ysdm
  is 'Ҫ�ش���';
comment on column FZ.fzry
  is '��֤��Ա';
comment on column FZ.fzsj
  is '��֤ʱ��';
comment on column FZ.fzmc
  is '��֤����';
comment on column FZ.fzsl
  is '��֤����';
comment on column FZ.hfzsh
  is '�˷�֤���';
comment on column FZ.lzrxm
  is '��֤������';
comment on column FZ.lzrzjlb
  is '��֤��֤�����';
comment on column FZ.lzrzjh
  is '��֤��֤����';
comment on column FZ.lzrdh
  is '��֤�˵绰';
comment on column FZ.lzrdz
  is '��֤�˵�ַ';
comment on column FZ.lzryb
  is '��֤���ʱ�';
comment on column FZ.bz
  is '��ע';

prompt
prompt Creating table GD
prompt =================
prompt
create table GD
(
  ywh  NVARCHAR2(36) not null,
  ysdm NVARCHAR2(10),
  dah  NVARCHAR2(50),
  djdl NVARCHAR2(50),
  djxl NVARCHAR2(128),
  zl   NVARCHAR2(200),
  qzhm NVARCHAR2(1024),
  wjjs INTEGER,
  zys  INTEGER,
  gdry NVARCHAR2(50),
  gdsj DATE,
  bz   NVARCHAR2(1024)
)
;
comment on table GD
  is '�鵵';
comment on column GD.ywh
  is 'ҵ���';
comment on column GD.ysdm
  is 'Ҫ�ش���';
comment on column GD.dah
  is '������';
comment on column GD.djdl
  is '�ǼǴ���';
comment on column GD.djxl
  is '�Ǽ�С��';
comment on column GD.zl
  is '����';
comment on column GD.qzhm
  is 'Ȩ֤����';
comment on column GD.wjjs
  is '�ļ�����';
comment on column GD.zys
  is '��ҳ��';
comment on column GD.gdry
  is '�鵵��Ա';
comment on column GD.gdsj
  is '�鵵ʱ��';
comment on column GD.bz
  is '��ע';
alter table GD
  add constraint PK_GD primary key (YWH);

prompt
prompt Creating table GJZWSYQ
prompt ======================
prompt
create table GJZWSYQ
(
  ywh        NVARCHAR2(36) not null,
  ysdm       NVARCHAR2(10),
  bdcdyh     NVARCHAR2(50),
  qllx       NVARCHAR2(2),
  djlx       NVARCHAR2(50),
  djyy       NVARCHAR2(128),
  zl         NVARCHAR2(2000),
  tdhysyqr   NVARCHAR2(128),
  tdhysymj   NUMBER(38,8),
  tdhysyqx   NVARCHAR2(100),
  tdhysyqssj DATE,
  tdhysyjssj DATE,
  gjzwlx     NVARCHAR2(2),
  gjzwghyt   NVARCHAR2(200),
  gjzwmj     NUMBER(38,8),
  jgsj       NVARCHAR2(50),
  bdcqzh     NVARCHAR2(1024),
  qxdm       NVARCHAR2(6),
  djjg       NVARCHAR2(200),
  dbr        NVARCHAR2(50),
  djsj       DATE,
  qlqtzk     NVARCHAR2(1024),
  fj         NVARCHAR2(1024),
  gjzwpmt    BLOB,
  qszt       NVARCHAR2(2)
)
;
comment on table GJZWSYQ
  is '������������Ȩ';
comment on column GJZWSYQ.ywh
  is 'ҵ���';
comment on column GJZWSYQ.ysdm
  is 'Ҫ�ش���';
comment on column GJZWSYQ.bdcdyh
  is '��������Ԫ��';
comment on column GJZWSYQ.qllx
  is 'Ȩ������';
comment on column GJZWSYQ.djlx
  is '�Ǽ�����';
comment on column GJZWSYQ.djyy
  is '�Ǽ�ԭ��';
comment on column GJZWSYQ.zl
  is '����';
comment on column GJZWSYQ.tdhysyqr
  is '����/����ʹ��Ȩ��';
comment on column GJZWSYQ.tdhysymj
  is '����/����ʹ�����';
comment on column GJZWSYQ.tdhysyqx
  is '����/����ʹ������';
comment on column GJZWSYQ.tdhysyqssj
  is '����/����ʹ����ʼʱ��';
comment on column GJZWSYQ.tdhysyjssj
  is '����/����ʹ�ý���ʱ��';
comment on column GJZWSYQ.gjzwlx
  is '����������������';
comment on column GJZWSYQ.gjzwghyt
  is '������������滮��;';
comment on column GJZWSYQ.gjzwmj
  is '��(��)�������';
comment on column GJZWSYQ.jgsj
  is '����ʱ��';
comment on column GJZWSYQ.bdcqzh
  is '������Ȩ֤��';
comment on column GJZWSYQ.qxdm
  is '���ش���';
comment on column GJZWSYQ.djjg
  is '�Ǽǻ���';
comment on column GJZWSYQ.dbr
  is '�ǲ���';
comment on column GJZWSYQ.djsj
  is '�Ǽ�ʱ��';
comment on column GJZWSYQ.qlqtzk
  is 'Ȩ������״��';
comment on column GJZWSYQ.fj
  is '����';
comment on column GJZWSYQ.gjzwpmt
  is '������������ƽ��ͼ';
comment on column GJZWSYQ.qszt
  is 'Ȩ��״̬';
alter table GJZWSYQ
  add constraint PK_GJZWSYQ primary key (YWH);

prompt
prompt Creating table GXXX
prompt ===================
prompt
create table GXXX
(
  bh     NVARCHAR2(36) not null,
  bt     NVARCHAR2(500),
  nr     BLOB,
  lb     NVARCHAR2(50),
  tjsj   DATE,
  xh     INTEGER,
  zt     NVARCHAR2(2),
  yxsj   DATE,
  htmlnr BLOB,
  ys     NVARCHAR2(50)
)
;
comment on table GXXX
  is '������Ϣ';
comment on column GXXX.bh
  is '��Ϣ���';
comment on column GXXX.bt
  is '��Ϣ����';
comment on column GXXX.nr
  is '��Ϣ����';
comment on column GXXX.lb
  is '��Ϣ���';
comment on column GXXX.tjsj
  is '���ʱ��';
comment on column GXXX.xh
  is '���';
comment on column GXXX.zt
  is '״̬';
comment on column GXXX.yxsj
  is '��Чʱ��';
comment on column GXXX.htmlnr
  is '��HTML��ǩ������';
comment on column GXXX.ys
  is '��ʽ�����ı�����URl���ӵ�ַ';
alter table GXXX
  add constraint PK_GXXX primary key (BH);

prompt
prompt Creating table GXXXFB
prompt =====================
prompt
create table GXXXFB
(
  zbh NVARCHAR2(36) not null,
  bh  NVARCHAR2(36),
  lb  NVARCHAR2(50),
  nr  NVARCHAR2(2000),
  sm  NVARCHAR2(2000),
  xh  INTEGER,
  zt  NVARCHAR2(2)
)
;
comment on table GXXXFB
  is '������Ϣ����';
comment on column GXXXFB.zbh
  is '������';
comment on column GXXXFB.bh
  is '������';
comment on column GXXXFB.lb
  is '���';
comment on column GXXXFB.nr
  is '����';
comment on column GXXXFB.sm
  is '˵��';
comment on column GXXXFB.xh
  is '���';
comment on column GXXXFB.zt
  is '״̬';
alter table GXXXFB
  add constraint PK_GXXXFB primary key (ZBH);

prompt
prompt Creating table H
prompt ================
prompt
create table H
(
  hid        NVARCHAR2(40),
  zid        NVARCHAR2(50),
  bdcdyh     NVARCHAR2(28),
  fwbm       NVARCHAR2(36),
  ysdm       NVARCHAR2(10),
  zrzh       NVARCHAR2(24),
  ljzh       NVARCHAR2(36),
  ch         NVARCHAR2(20),
  zl         NVARCHAR2(2000),
  mjdw       NVARCHAR2(2),
  dyh        NVARCHAR2(10),
  fjh        NVARCHAR2(29),
  mych       NVARCHAR2(99),
  sjcs       NVARCHAR2(1999),
  hh         NVARCHAR2(1999),
  shbw       NVARCHAR2(29),
  hx         NVARCHAR2(4),
  hxjg       NVARCHAR2(7),
  fwyt1      NVARCHAR2(32),
  fwyt2      NVARCHAR2(32),
  fwyt3      NVARCHAR2(32),
  ycjzmj     NUMBER(38,8),
  yctnjzmj   NUMBER(38,8),
  ycftjzmj   NUMBER(38,8),
  ycdxbfjzmj NUMBER(38,8),
  ycqtjzmj   NUMBER(38,8),
  ycftxs     NUMBER(38,8),
  scjzmj     NUMBER(38,8),
  sctnjzmj   NUMBER(38,8),
  scftjzmj   NUMBER(38,8),
  scdxbfjzmj NUMBER(38,8),
  scqtjzmj   NUMBER(38,8),
  scftxs     NUMBER(38,8),
  gytdmj     NUMBER(38,8),
  fttdmj     NUMBER(38,8),
  dytdmj     NUMBER(38,8),
  fwlx       NVARCHAR2(4),
  fwxz       NVARCHAR2(4),
  fcfht      BLOB,
  zt         NVARCHAR2(2),
  isrghs     NVARCHAR2(2),
  rghsry     NVARCHAR2(50),
  rghsrq     DATE,
  yhbh       NVARCHAR2(36),
  hlx        NVARCHAR2(32),
  fjzb       NVARCHAR2(128),
  hzt        INTEGER,
  zbtop      INTEGER,
  zbleft     INTEGER,
  zbbottom   INTEGER,
  zbright    INTEGER,
  sjclh      INTEGER,
  yhid       NVARCHAR2(36),
  dcsj       DATE,
  hdj        NUMBER(38,8),
  zddm       NVARCHAR2(19),
  ytmc       NVARCHAR2(1999),
  fwlxmc     NVARCHAR2(1999),
  fwxzmc     NVARCHAR2(1999),
  bgjzxx     NVARCHAR2(128),
  bgtsxx     NVARCHAR2(128),
  gzwlx      NVARCHAR2(36)
)
;
comment on table H
  is '��';
comment on column H.hid
  is '��ID';
comment on column H.zid
  is '�����';
comment on column H.bdcdyh
  is '��������Ԫ��';
comment on column H.fwbm
  is '���ݱ���';
comment on column H.ysdm
  is 'Ҫ�ش���';
comment on column H.zrzh
  is '��Ȼ����';
comment on column H.ljzh
  is '�߼�����';
comment on column H.ch
  is '���';
comment on column H.zl
  is '����';
comment on column H.mjdw
  is '�����λ';
comment on column H.dyh
  is '��Ԫ��';
comment on column H.fjh
  is '�����';
comment on column H.mych
  is '������';
comment on column H.sjcs
  is 'ʵ�ʲ���';
comment on column H.hh
  is '����';
comment on column H.shbw
  is '�ҺŲ�λ';
comment on column H.hx
  is '����';
comment on column H.hxjg
  is '���ͽṹ';
comment on column H.fwyt1
  is '������;1';
comment on column H.fwyt2
  is '������;2';
comment on column H.fwyt3
  is '������;3';
comment on column H.ycjzmj
  is 'Ԥ�⽨�����';
comment on column H.yctnjzmj
  is 'Ԥ�����ڽ������';
comment on column H.ycftjzmj
  is 'Ԥ���̯�������';
comment on column H.ycdxbfjzmj
  is 'Ԥ����²��ֽ������';
comment on column H.ycqtjzmj
  is 'Ԥ�������������';
comment on column H.ycftxs
  is 'Ԥ���̯ϵ��';
comment on column H.scjzmj
  is 'ʵ�⽨�����';
comment on column H.sctnjzmj
  is 'ʵ�����ڽ������';
comment on column H.scftjzmj
  is 'ʵ���̯�������';
comment on column H.scdxbfjzmj
  is 'ʵ����²��ֽ������';
comment on column H.scqtjzmj
  is 'ʵ�������������';
comment on column H.scftxs
  is 'ʵ���̯ϵ��';
comment on column H.gytdmj
  is '�����������';
comment on column H.fttdmj
  is '��̯�������';
comment on column H.dytdmj
  is '�����������';
comment on column H.fwlx
  is '��������';
comment on column H.fwxz
  is '��������';
comment on column H.fcfht
  is '�����ֻ�ͼ';
comment on column H.zt
  is '״̬';
comment on column H.isrghs
  is '�Ƿ��˹���ʵ';
comment on column H.rghsry
  is '�˹���ʵ��Ա';
comment on column H.rghsrq
  is '�˹���ʵ����';
comment on column H.yhbh
  is 'ԭ�����';
comment on column H.hlx
  is '������';
comment on column H.fjzb
  is '��������';
comment on column H.hzt
  is '��״̬�Ƿ�ɵǼ�';
comment on column H.zbtop
  is '������';
comment on column H.zbleft
  is '������';
comment on column H.zbbottom
  is '������';
comment on column H.zbright
  is '������';
comment on column H.sjclh
  is 'ʵ�ʲ��к�';
comment on column H.dcsj
  is '����ʱ��';
comment on column H.hdj
  is '������';
comment on column H.zddm
  is '�ڵش���';
comment on column H.ytmc
  is '��;����';
comment on column H.fwlxmc
  is '������������';
comment on column H.fwxzmc
  is '������������';
comment on column H.bgjzxx
  is '�����ֹ��Ϣ';
comment on column H.bgtsxx
  is '�����ʾ��Ϣ';
comment on column H.gzwlx
  is '����������';

prompt
prompt Creating table HT
prompt =================
prompt
create table HT
(
  ywh     NVARCHAR2(36) not null,
  htbh    NVARCHAR2(128),
  htlx    NVARCHAR2(36),
  djje    NUMBER(38,8),
  htqdrq  DATE,
  htqrrq  DATE,
  htqrr   NVARCHAR2(50),
  cqzh    NVARCHAR2(50),
  fwyt    NVARCHAR2(128),
  jzmj    NUMBER(38,8),
  tnjzmj  NUMBER(38,8),
  ftjzmj  NUMBER(38,8),
  htje    NUMBER(38,8),
  dj      NUMBER(38,8),
  gyqk    NVARCHAR2(128),
  gyfs    NVARCHAR2(8),
  bdcfeyd NVARCHAR2(512),
  jbr     NVARCHAR2(128),
  cxrq    DATE,
  cxr     NVARCHAR2(128),
  bdcsyqr NVARCHAR2(256),
  fklx    NVARCHAR2(5),
  dkfs    NVARCHAR2(5),
  fksj    DATE,
  zt      INTEGER,
  sfyx    INTEGER,
  qszt    INTEGER,
  yhbs    NVARCHAR2(36),
  djlx    NVARCHAR2(36),
  dqbz    NVARCHAR2(36),
  dqbljs  NVARCHAR2(64),
  tdzl    NVARCHAR2(128),
  zdtybm  NVARCHAR2(19),
  tdxgzh  NVARCHAR2(128),
  htmb    NVARCHAR2(128),
  fkzzrq  DATE,
  sfqefq  NVARCHAR2(4),
  yszjzh  NVARCHAR2(50),
  jgyh    NVARCHAR2(128),
  sqsj    DATE
)
;
comment on table HT
  is '��ͬ��';
comment on column HT.ywh
  is '������';
comment on column HT.htbh
  is '��ͬ���';
comment on column HT.htlx
  is '��ͬ����';
comment on column HT.djje
  is '������';
comment on column HT.htqdrq
  is '��ͬǩ������';
comment on column HT.htqrrq
  is '��ͬȷ������';
comment on column HT.htqrr
  is '��ͬȷ����';
comment on column HT.cqzh
  is '��Ȩ֤��';
comment on column HT.fwyt
  is '������;';
comment on column HT.jzmj
  is '�������';
comment on column HT.tnjzmj
  is '���ڽ������';
comment on column HT.ftjzmj
  is '��̯�������';
comment on column HT.htje
  is '��ͬ���';
comment on column HT.dj
  is '����';
comment on column HT.gyqk
  is '�������';
comment on column HT.gyfs
  is '���з�ʽ';
comment on column HT.bdcfeyd
  is '�������ݶ�Լ��';
comment on column HT.jbr
  is '������';
comment on column HT.cxrq
  is '��ͬ��������';
comment on column HT.cxr
  is '��ͬ����ȷ����';
comment on column HT.bdcsyqr
  is '����������Ȩ��';
comment on column HT.fklx
  is '��������';
comment on column HT.dkfs
  is '���ʽ';
comment on column HT.fksj
  is '����ʱ��';
comment on column HT.zt
  is '״̬(0:�����У�1:����У�2:�ѱ���)';
comment on column HT.sfyx
  is '�Ƿ���Ч';
comment on column HT.qszt
  is '��ʵ\��ʷ״̬';
comment on column HT.yhbs
  is '�û���ʶ';
comment on column HT.djlx
  is '�Ǽ�����';
comment on column HT.dqbz
  is '��ǰ����';
comment on column HT.dqbljs
  is '��ǰ�����ɫ';
comment on column HT.tdzl
  is '��������';
comment on column HT.zdtybm
  is '�ڵ�ͳһ����';
comment on column HT.tdxgzh
  is '�������֤��';
comment on column HT.htmb
  is '��ͬģ��';
comment on column HT.fkzzrq
  is '�����ֹ����';
comment on column HT.sfqefq
  is '�Ƿ�ȫ��壨��/��';
comment on column HT.yszjzh
  is '��Ʒ��Ԥ���ʽ�ר���˺�';
comment on column HT.jgyh
  is '�������';
comment on column HT.sqsj
  is '����ʱ��';
alter table HT
  add constraint PK_HT primary key (YWH);

prompt
prompt Creating table HYSYQ
prompt ====================
prompt
create table HYSYQ
(
  ywh     NVARCHAR2(36) not null,
  ysdm    NVARCHAR2(10),
  zhhddm  NVARCHAR2(19),
  bdcdyh  NVARCHAR2(50),
  qllx    NVARCHAR2(2),
  djlx    NVARCHAR2(50),
  djyy    NVARCHAR2(128),
  syqmj   NUMBER(38,8),
  syqx    NVARCHAR2(100),
  syqqssj DATE,
  syqjssj DATE,
  syjze   NUMBER(38,8),
  syjbzyj NVARCHAR2(1024),
  syjjnqk NVARCHAR2(1024),
  bdcqzh  NVARCHAR2(1024),
  qxdm    NVARCHAR2(6),
  djjg    NVARCHAR2(200),
  dbr     NVARCHAR2(50),
  djsj    DATE,
  qlqtzk  NVARCHAR2(1024),
  fj      NVARCHAR2(1024),
  qszt    NVARCHAR2(2)
)
;
comment on table HYSYQ
  is '���򺣵�ʹ��Ȩ';
comment on column HYSYQ.ywh
  is 'ҵ���';
comment on column HYSYQ.ysdm
  is 'Ҫ�ش���';
comment on column HYSYQ.zhhddm
  is '�ں�/��������';
comment on column HYSYQ.bdcdyh
  is '��������Ԫ��';
comment on column HYSYQ.qllx
  is 'Ȩ������';
comment on column HYSYQ.djlx
  is '�Ǽ�����';
comment on column HYSYQ.djyy
  is '�Ǽ�ԭ��';
comment on column HYSYQ.syqmj
  is 'ʹ��Ȩ���';
comment on column HYSYQ.syqx
  is 'ʹ������';
comment on column HYSYQ.syqqssj
  is 'ʹ��Ȩ��ʼʱ��';
comment on column HYSYQ.syqjssj
  is 'ʹ��Ȩ����ʱ��';
comment on column HYSYQ.syjze
  is 'ʹ�ý��ܶ�';
comment on column HYSYQ.syjbzyj
  is 'ʹ�ý��׼����';
comment on column HYSYQ.syjjnqk
  is 'ʹ�ý�������';
comment on column HYSYQ.bdcqzh
  is '������Ȩ֤��';
comment on column HYSYQ.qxdm
  is '���ش���';
comment on column HYSYQ.djjg
  is '�Ǽǻ���';
comment on column HYSYQ.dbr
  is '�ǲ���';
comment on column HYSYQ.djsj
  is '�Ǽ�ʱ��';
comment on column HYSYQ.qlqtzk
  is 'Ȩ������״��';
comment on column HYSYQ.fj
  is '����';
comment on column HYSYQ.qszt
  is 'Ȩ��״̬';
alter table HYSYQ
  add constraint PK_HYSYQ primary key (YWH);

prompt
prompt Creating table JSYDSYQ
prompt ======================
prompt
create table JSYDSYQ
(
  ywh     NVARCHAR2(36),
  ysdm    NVARCHAR2(10),
  zddm    NVARCHAR2(19),
  bdcdyh  NVARCHAR2(50),
  qllx    NVARCHAR2(32),
  djlx    NVARCHAR2(128),
  djyy    NVARCHAR2(128),
  syqmj   NUMBER(38,8),
  syqx    NVARCHAR2(100),
  syqqssj DATE,
  syqjssj DATE,
  qdjg    NUMBER(38,8),
  bdcqzh  NVARCHAR2(1024),
  qxdm    NVARCHAR2(16),
  djjg    NVARCHAR2(200),
  dbr     NVARCHAR2(50),
  djsj    DATE,
  qlqtzk  NVARCHAR2(1024),
  fj      NVARCHAR2(1024),
  qszt    NVARCHAR2(2),
  zslx    NVARCHAR2(32)
)
;
comment on table JSYDSYQ
  is '�����õ�ʹ��Ȩ';
comment on column JSYDSYQ.ywh
  is 'ҵ���';
comment on column JSYDSYQ.ysdm
  is 'Ҫ�ش���';
comment on column JSYDSYQ.zddm
  is '�ڵش���';
comment on column JSYDSYQ.bdcdyh
  is '��������Ԫ��';
comment on column JSYDSYQ.qllx
  is 'Ȩ������';
comment on column JSYDSYQ.djlx
  is '�Ǽ�����';
comment on column JSYDSYQ.djyy
  is '�Ǽ�ԭ��';
comment on column JSYDSYQ.syqmj
  is 'ʹ��Ȩ���';
comment on column JSYDSYQ.syqx
  is 'ʹ������';
comment on column JSYDSYQ.syqqssj
  is 'ʹ��Ȩ��ʼʱ��';
comment on column JSYDSYQ.syqjssj
  is 'ʹ��Ȩ����ʱ��';
comment on column JSYDSYQ.qdjg
  is 'ȡ�ü۸�';
comment on column JSYDSYQ.bdcqzh
  is '������Ȩ֤��';
comment on column JSYDSYQ.qxdm
  is '���ش���';
comment on column JSYDSYQ.djjg
  is '�Ǽǻ���';
comment on column JSYDSYQ.dbr
  is '�ǲ���';
comment on column JSYDSYQ.djsj
  is '�Ǽ�ʱ��';
comment on column JSYDSYQ.qlqtzk
  is 'Ȩ������״��';
comment on column JSYDSYQ.fj
  is '����';
comment on column JSYDSYQ.qszt
  is 'Ȩ��״̬';
comment on column JSYDSYQ.zslx
  is '֤������';

prompt
prompt Creating table KPGL
prompt ===================
prompt
create table KPGL
(
  slbh          NVARCHAR2(36) not null,
  xkbh          NVARCHAR2(36),
  xkzh          NVARCHAR2(100),
  xmmc          NVARCHAR2(100),
  kfdw          NVARCHAR2(200),
  fgwwjm        NVARCHAR2(100),
  fgwph         NVARCHAR2(100),
  pzrq          DATE,
  zjzmj         NUMBER(38,8),
  zzjzmj        NUMBER(38,8),
  fzzjzmj       NUMBER(38,8),
  szqy          NVARCHAR2(36),
  rjl           NVARCHAR2(36),
  lxyxq         NVARCHAR2(36),
  zzdmj         NUMBER(38,8),
  dszdmj        NUMBER(38,8),
  dxzdmj        NUMBER(38,8),
  zzzdmj        NUMBER(38,8),
  spzdmj        NUMBER(38,8),
  fszdmj        NUMBER(38,8),
  ghzts         NVARCHAR2(36),
  ldl           NVARCHAR2(36),
  jzmd          NVARCHAR2(36),
  xmjsksrq      DATE,
  yjxmwgrq      DATE,
  gcztz         NUMBER(38,8),
  tdzh          NVARCHAR2(100),
  jsydxkzh      NVARCHAR2(100),
  jsgcsjfahdtzs NVARCHAR2(100),
  xmdz          NVARCHAR2(100),
  bzfpjb        NVARCHAR2(36),
  slcdz         NVARCHAR2(128),
  sldh          NVARCHAR2(36),
  sjdw          NVARCHAR2(128),
  sgdw          NVARCHAR2(128),
  jldw          NVARCHAR2(128),
  xmjj          NVARCHAR2(2000),
  xmjd          NVARCHAR2(1024),
  xmpt          NVARCHAR2(1024),
  zbpt          NVARCHAR2(1024),
  zt            INTEGER,
  sqsj          DATE,
  jbr           NVARCHAR2(128),
  sjcrsj        DATE
)
;
comment on table KPGL
  is '���̹���';
comment on column KPGL.slbh
  is '������';
comment on column KPGL.xkbh
  is '��ɱ��';
comment on column KPGL.xkzh
  is '���֤��';
comment on column KPGL.xmmc
  is '��Ŀ����';
comment on column KPGL.kfdw
  is '������λ';
comment on column KPGL.fgwwjm
  is '����ί�ļ���';
comment on column KPGL.fgwph
  is '����ί����';
comment on column KPGL.pzrq
  is '��׼����';
comment on column KPGL.zjzmj
  is '�ܽ������';
comment on column KPGL.zzjzmj
  is 'סլ�������';
comment on column KPGL.fzzjzmj
  is '��סլ�������';
comment on column KPGL.szqy
  is '��������';
comment on column KPGL.rjl
  is '�ݻ���';
comment on column KPGL.lxyxq
  is '������Ч��';
comment on column KPGL.zzdmj
  is '��ռ�����';
comment on column KPGL.dszdmj
  is '����ռ�����';
comment on column KPGL.dxzdmj
  is '����ռ�����';
comment on column KPGL.zzzdmj
  is 'סլռ�����';
comment on column KPGL.spzdmj
  is '����ռ�����';
comment on column KPGL.fszdmj
  is '����ռ�����';
comment on column KPGL.ghzts
  is '�滮������';
comment on column KPGL.ldl
  is '�̵���';
comment on column KPGL.jzmd
  is '�����ܶ�';
comment on column KPGL.xmjsksrq
  is '��Ŀ���迪ʼ����';
comment on column KPGL.yjxmwgrq
  is 'Ԥ����Ŀ�깤����';
comment on column KPGL.gcztz
  is '������Ͷ��';
comment on column KPGL.tdzh
  is '����ʹ��֤';
comment on column KPGL.jsydxkzh
  is '�����õع滮���֤';
comment on column KPGL.jsgcsjfahdtzs
  is '���蹤����Ʒ����˶�֪ͨ��';
comment on column KPGL.xmdz
  is '��Ŀ��ַ';
comment on column KPGL.bzfpjb
  is '���Ϸ��佨��';
comment on column KPGL.slcdz
  is '��¥����ַ';
comment on column KPGL.sldh
  is '��¥�绰';
comment on column KPGL.sjdw
  is '��Ƶ�λ';
comment on column KPGL.sgdw
  is 'ʩ����λ';
comment on column KPGL.jldw
  is '����λ';
comment on column KPGL.xmjj
  is '��Ŀ���';
comment on column KPGL.xmjd
  is '��Ŀ����';
comment on column KPGL.xmpt
  is '��Ŀ����';
comment on column KPGL.zbpt
  is '�ܱ�����';
comment on column KPGL.zt
  is '״̬(0:�����У�1:����У�2:ͨ����3:δͨ��)';
comment on column KPGL.sqsj
  is '����ʱ��';
comment on column KPGL.jbr
  is '������';
comment on column KPGL.sjcrsj
  is '���ݲ���ʱ��';
alter table KPGL
  add constraint PK_KPGL primary key (SLBH);

prompt
prompt Creating table LJZ
prompt ==================
prompt
create table LJZ
(
  zid    NVARCHAR2(36),
  ljzh   NVARCHAR2(36),
  zrzh   NVARCHAR2(24),
  ysdm   NVARCHAR2(10),
  mph    NVARCHAR2(50),
  ycjzmj NUMBER(38,8),
  ycdxmj NUMBER(38,8),
  ycqtmj NUMBER(38,8),
  scjzmj NUMBER(38,8),
  scdxmj NUMBER(38,8),
  scqtmj NUMBER(38,8),
  jgrq   DATE,
  fwjg1  NVARCHAR2(32),
  fwjg2  NVARCHAR2(32),
  fwjg3  NVARCHAR2(32),
  jzwzt  NVARCHAR2(4),
  fwyt1  NVARCHAR2(32),
  fwyt2  NVARCHAR2(32),
  fwyt3  NVARCHAR2(32),
  zcs    NUMBER(15,2),
  dscs   NVARCHAR2(50),
  dxcs   NVARCHAR2(50),
  bz     NVARCHAR2(1024),
  zddm   NVARCHAR2(19),
  isrghs NVARCHAR2(2),
  rghsry NVARCHAR2(50),
  rghsrq DATE,
  dcsj   DATE,
  ytmc   NVARCHAR2(1999),
  xmbh   NVARCHAR2(36),
  xmmc   NVARCHAR2(100),
  zl     NVARCHAR2(2000),
  bgjzxx NVARCHAR2(128),
  bgtsxx NVARCHAR2(128),
  jcnf   NVARCHAR2(50)
)
;
comment on table LJZ
  is '�߼���';
comment on column LJZ.zid
  is '�����';
comment on column LJZ.ljzh
  is '�߼�����';
comment on column LJZ.zrzh
  is '��Ȼ����';
comment on column LJZ.ysdm
  is 'Ҫ�ش���';
comment on column LJZ.mph
  is '���ƺ�';
comment on column LJZ.ycjzmj
  is 'Ԥ�⽨�����';
comment on column LJZ.ycdxmj
  is 'Ԥ��������';
comment on column LJZ.ycqtmj
  is 'Ԥ���������';
comment on column LJZ.scjzmj
  is 'ʵ�⽨�����';
comment on column LJZ.scdxmj
  is 'ʵ��������';
comment on column LJZ.scqtmj
  is 'ʵ���������';
comment on column LJZ.jgrq
  is '��������';
comment on column LJZ.fwjg1
  is '���ݽṹ1';
comment on column LJZ.fwjg2
  is '���ݽṹ2';
comment on column LJZ.fwjg3
  is '���ݽṹ3';
comment on column LJZ.jzwzt
  is '������״̬';
comment on column LJZ.fwyt1
  is '������;1';
comment on column LJZ.fwyt2
  is '������;2';
comment on column LJZ.fwyt3
  is '������;3';
comment on column LJZ.zcs
  is '�ܲ���';
comment on column LJZ.dscs
  is '���ϲ���';
comment on column LJZ.dxcs
  is '���²���';
comment on column LJZ.bz
  is '��ע';
comment on column LJZ.zddm
  is '�ڵش���';
comment on column LJZ.isrghs
  is '�Ƿ��˹���ʵ';
comment on column LJZ.rghsry
  is '�˹���ʵ��Ա';
comment on column LJZ.rghsrq
  is '�˹���ʵ����';
comment on column LJZ.dcsj
  is '����ʱ��';
comment on column LJZ.ytmc
  is '��;����';
comment on column LJZ.xmbh
  is '��Ŀ���';
comment on column LJZ.xmmc
  is '��Ŀ����';
comment on column LJZ.zl
  is '����';
comment on column LJZ.bgjzxx
  is '�����ֹ��Ϣ';
comment on column LJZ.bgtsxx
  is '�����ʾ��Ϣ';
comment on column LJZ.jcnf
  is '�������';

prompt
prompt Creating table LQ
prompt =================
prompt
create table LQ
(
  ywh       NVARCHAR2(36) not null,
  ysdm      NVARCHAR2(10),
  bdcdyh    NVARCHAR2(50),
  qllx      NVARCHAR2(2),
  djlx      NVARCHAR2(50),
  djyy      NVARCHAR2(128),
  fbf       NVARCHAR2(100),
  syqmj     NUMBER(38,8),
  ldsyqx    NVARCHAR2(100),
  ldsyqssj  DATE,
  ldsyjssj  DATE,
  ldsyqxz   NVARCHAR2(4),
  sllmsyqr1 NVARCHAR2(100),
  sllmsyqr2 NVARCHAR2(100),
  zysz      NVARCHAR2(200),
  zs        INTEGER,
  lz        NVARCHAR2(4),
  qy        NVARCHAR2(2),
  zlnd      NVARCHAR2(4),
  lb        NVARCHAR2(50),
  xb        NVARCHAR2(50),
  xdm       NVARCHAR2(200),
  bdcqzh    NVARCHAR2(1024),
  qxdm      NVARCHAR2(6),
  djjg      NVARCHAR2(200),
  dbr       NVARCHAR2(50),
  djsj      DATE,
  qlqtzk    NVARCHAR2(1024),
  fj        NVARCHAR2(1024),
  qszt      NVARCHAR2(2)
)
;
comment on table LQ
  is '��Ȩ';
comment on column LQ.ywh
  is 'ҵ���';
comment on column LQ.ysdm
  is 'Ҫ�ش���';
comment on column LQ.bdcdyh
  is '��������Ԫ��';
comment on column LQ.qllx
  is 'Ȩ������';
comment on column LQ.djlx
  is '�Ǽ�����';
comment on column LQ.djyy
  is '�Ǽ�ԭ��';
comment on column LQ.fbf
  is '������';
comment on column LQ.syqmj
  is 'ʹ��Ȩ���а������';
comment on column LQ.ldsyqx
  is '�ֵ�ʹ�ã��а�������';
comment on column LQ.ldsyqssj
  is '�ֵ�ʹ�ã��а�����ʼʱ��';
comment on column LQ.ldsyjssj
  is '�ֵ�ʹ�ã��а�������ʱ��';
comment on column LQ.ldsyqxz
  is '�ֵ�����Ȩ����';
comment on column LQ.sllmsyqr1
  is 'ɭ�֡���ľ����Ȩ��';
comment on column LQ.sllmsyqr2
  is 'ɭ�֡���ľʹ��Ȩ��';
comment on column LQ.zysz
  is '��Ҫ����';
comment on column LQ.zs
  is '����';
comment on column LQ.lz
  is '����';
comment on column LQ.qy
  is '��Դ';
comment on column LQ.zlnd
  is '�������';
comment on column LQ.lb
  is '�ְ�';
comment on column LQ.xb
  is 'С��';
comment on column LQ.xdm
  is 'С����';
comment on column LQ.bdcqzh
  is '������Ȩ֤��';
comment on column LQ.qxdm
  is '���ش���';
comment on column LQ.djjg
  is '�Ǽǻ���';
comment on column LQ.dbr
  is '�ǲ���';
comment on column LQ.djsj
  is '�Ǽ�ʱ��';
comment on column LQ.qlqtzk
  is 'Ȩ������״��';
comment on column LQ.fj
  is '����';
comment on column LQ.qszt
  is 'Ȩ��״̬';
alter table LQ
  add constraint PK_LQ primary key (YWH);

prompt
prompt Creating table NYDSYQ
prompt =====================
prompt
create table NYDSYQ
(
  ywh     NVARCHAR2(36) not null,
  ysdm    NVARCHAR2(10),
  bdcdyh  NVARCHAR2(50),
  qllx    NVARCHAR2(2),
  djlx    NVARCHAR2(50),
  djyy    NVARCHAR2(128),
  zl      NVARCHAR2(2000),
  fbfdm   NVARCHAR2(100),
  fbfmc   NVARCHAR2(100),
  cbmj    NUMBER(38,8),
  cbsyqx  NVARCHAR2(100),
  cbqssj  DATE,
  cbjssj  DATE,
  tdsyqxz NVARCHAR2(2),
  syttlx  NVARCHAR2(2),
  yzyfs   NVARCHAR2(2),
  cyzl    NVARCHAR2(3),
  syzcl   INTEGER,
  bdcqzh  NVARCHAR2(1024),
  qxdm    NVARCHAR2(6),
  djjg    NVARCHAR2(200),
  dbr     NVARCHAR2(50),
  djsj    DATE,
  qlqtzk  NVARCHAR2(1024),
  fj      NVARCHAR2(1024),
  qszt    NVARCHAR2(2)
)
;
comment on table NYDSYQ
  is 'ũ�õ�ʹ��Ȩ';
comment on column NYDSYQ.ywh
  is 'ҵ���';
comment on column NYDSYQ.ysdm
  is 'Ҫ�ش���';
comment on column NYDSYQ.bdcdyh
  is '��������Ԫ��';
comment on column NYDSYQ.qllx
  is 'Ȩ������';
comment on column NYDSYQ.djlx
  is '�Ǽ�����';
comment on column NYDSYQ.djyy
  is '�Ǽ�ԭ��';
comment on column NYDSYQ.zl
  is '����';
comment on column NYDSYQ.fbfdm
  is '����������';
comment on column NYDSYQ.fbfmc
  is '����������';
comment on column NYDSYQ.cbmj
  is '�а���ʹ��Ȩ�����';
comment on column NYDSYQ.cbsyqx
  is '�а�(ʹ��)����';
comment on column NYDSYQ.cbqssj
  is '�а�(ʹ��)��ʼʱ��';
comment on column NYDSYQ.cbjssj
  is '�а�(ʹ��)����ʱ��';
comment on column NYDSYQ.tdsyqxz
  is '��������Ȩ����';
comment on column NYDSYQ.syttlx
  is 'ˮ��̲Ϳ����';
comment on column NYDSYQ.yzyfs
  is '��ֳҵ��ʽ';
comment on column NYDSYQ.cyzl
  is '��ԭ����';
comment on column NYDSYQ.syzcl
  is '����������';
comment on column NYDSYQ.bdcqzh
  is '������Ȩ֤��';
comment on column NYDSYQ.qxdm
  is '���ش���';
comment on column NYDSYQ.djjg
  is '�Ǽǻ���';
comment on column NYDSYQ.dbr
  is '�ǲ���';
comment on column NYDSYQ.djsj
  is '�Ǽ�ʱ��';
comment on column NYDSYQ.qlqtzk
  is 'Ȩ������״��';
comment on column NYDSYQ.fj
  is '����';
comment on column NYDSYQ.qszt
  is 'Ȩ��״̬';
alter table NYDSYQ
  add constraint PK_NYDSYQ primary key (YWH);

prompt
prompt Creating table QLR
prompt ==================
prompt
create table QLR
(
  ywh     NVARCHAR2(50),
  ysdm    NVARCHAR2(10),
  bdcdyh  NVARCHAR2(68),
  sxh     INTEGER,
  qlrmc   NVARCHAR2(2000),
  bdcqzh  NVARCHAR2(68),
  qzysxlh NVARCHAR2(100),
  sfczr   NVARCHAR2(16),
  qllx    NVARCHAR2(32),
  qszt    NVARCHAR2(2),
  zjzl    NVARCHAR2(2),
  zjh     NVARCHAR2(816),
  fzjg    NVARCHAR2(200),
  sshy    NVARCHAR2(6),
  gj      NVARCHAR2(6),
  hjszss  NVARCHAR2(8),
  xb      NVARCHAR2(2),
  dh      NVARCHAR2(50),
  dz      NVARCHAR2(200),
  yb      NVARCHAR2(10),
  gzdw    NVARCHAR2(100),
  dzyj    NVARCHAR2(50),
  qlrlx   NVARCHAR2(32),
  qlbl    NVARCHAR2(100),
  gyfs    NVARCHAR2(64),
  gyqk    NVARCHAR2(1024),
  bz      NVARCHAR2(1024),
  sqrlx   NVARCHAR2(50),
  qlrid   NVARCHAR2(36)
)
;
comment on column QLR.ysdm
  is 'Ҫ�ش���';
comment on column QLR.bdcdyh
  is '��������Ԫ��';
comment on column QLR.sxh
  is '˳���';
comment on column QLR.qlrmc
  is 'Ȩ��������';
comment on column QLR.bdcqzh
  is '������Ȩ֤��';
comment on column QLR.qzysxlh
  is 'Ȩ֤ӡˢ���к�';
comment on column QLR.sfczr
  is '�Ƿ��֤��';
comment on column QLR.qllx
  is 'Ȩ������';
comment on column QLR.qszt
  is 'Ȩ��״̬';
comment on column QLR.zjzl
  is '֤������';
comment on column QLR.zjh
  is '֤����';
comment on column QLR.fzjg
  is '��֤����';
comment on column QLR.sshy
  is '������ҵ';
comment on column QLR.gj
  is '����/����';
comment on column QLR.hjszss
  is '��������ʡ��';
comment on column QLR.xb
  is '�Ա�';
comment on column QLR.dh
  is '�绰';
comment on column QLR.dz
  is '��ַ';
comment on column QLR.yb
  is '�ʱ�';
comment on column QLR.gzdw
  is '������λ';
comment on column QLR.dzyj
  is '�����ʼ�';
comment on column QLR.qlrlx
  is 'Ȩ��������';
comment on column QLR.qlbl
  is 'Ȩ������';
comment on column QLR.gyfs
  is '���з�ʽ';
comment on column QLR.gyqk
  is '�������';
comment on column QLR.bz
  is '��ע';
comment on column QLR.sqrlx
  is '����������';
comment on column QLR.qlrid
  is 'Ȩ����ID';

prompt
prompt Creating table QTXGQL
prompt =====================
prompt
create table QTXGQL
(
  ywh    NVARCHAR2(36) not null,
  ysdm   NVARCHAR2(10),
  bdcdyh NVARCHAR2(50),
  qllx   NVARCHAR2(2),
  djlx   NVARCHAR2(6),
  djyy   NVARCHAR2(128),
  qlqx   NVARCHAR2(100),
  qlqssj DATE,
  qljssj DATE,
  qsfs   NVARCHAR2(100),
  sylx   NVARCHAR2(100),
  qsl    NUMBER(38,8),
  qsyt   NVARCHAR2(200),
  kcmj   NUMBER(38,8),
  kcfs   NVARCHAR2(500),
  kckz   NVARCHAR2(500),
  scgm   NVARCHAR2(500),
  bdcqzh NVARCHAR2(1024),
  qxdm   NVARCHAR2(6),
  djjg   NVARCHAR2(200),
  dbr    NVARCHAR2(50),
  djsj   DATE,
  qlqtzk NVARCHAR2(1024),
  fj     NVARCHAR2(1024),
  ft     BLOB,
  qszt   NVARCHAR2(2)
)
;
comment on table QTXGQL
  is '�������Ȩ��';
comment on column QTXGQL.ywh
  is 'ҵ���';
comment on column QTXGQL.ysdm
  is 'Ҫ�ش���';
comment on column QTXGQL.bdcdyh
  is '��������Ԫ��';
comment on column QTXGQL.qllx
  is 'Ȩ������';
comment on column QTXGQL.djlx
  is '�Ǽ�����';
comment on column QTXGQL.djyy
  is '�Ǽ�ԭ��';
comment on column QTXGQL.qlqx
  is 'Ȩ������';
comment on column QTXGQL.qlqssj
  is 'Ȩ����ʼʱ��';
comment on column QTXGQL.qljssj
  is 'Ȩ������ʱ��';
comment on column QTXGQL.qsfs
  is 'ȡˮ��ʽ';
comment on column QTXGQL.sylx
  is 'ˮԴ����';
comment on column QTXGQL.qsl
  is 'ȡˮ��';
comment on column QTXGQL.qsyt
  is 'ȡˮ��;';
comment on column QTXGQL.kcmj
  is '�������';
comment on column QTXGQL.kcfs
  is '���ɷ�ʽ';
comment on column QTXGQL.kckz
  is '���ɿ���';
comment on column QTXGQL.scgm
  is '������ģ';
comment on column QTXGQL.bdcqzh
  is '������Ȩ֤��';
comment on column QTXGQL.qxdm
  is '���ش���';
comment on column QTXGQL.djjg
  is '�Ǽǻ���';
comment on column QTXGQL.dbr
  is '�ǲ���';
comment on column QTXGQL.djsj
  is '�Ǽ�ʱ��';
comment on column QTXGQL.qlqtzk
  is 'Ȩ������״��';
comment on column QTXGQL.fj
  is '����';
comment on column QTXGQL.ft
  is '��ͼ';
comment on column QTXGQL.qszt
  is 'Ȩ��״̬';
alter table QTXGQL
  add constraint PK_QTXGQL primary key (YWH);

prompt
prompt Creating table SF
prompt =================
prompt
create table SF
(
  ywh     NVARCHAR2(36) not null,
  ysdm    NVARCHAR2(10),
  jfry    NVARCHAR2(50),
  jfrq    DATE,
  sfkmmc  NVARCHAR2(50),
  sfewsf  NVARCHAR2(2),
  sfjs    NUMBER(38,8),
  sflx    NVARCHAR2(2),
  ysje    NVARCHAR2(36),
  zkhysje NUMBER(38,8),
  sfry    NVARCHAR2(50),
  sfrq    DATE,
  fff     NVARCHAR2(10),
  sjffr   NVARCHAR2(50),
  ssje    NUMBER(38,8),
  sfdw    NVARCHAR2(50)
)
;
comment on table SF
  is '�շ�';
comment on column SF.ywh
  is 'ҵ���';
comment on column SF.ysdm
  is 'Ҫ�ش���';
comment on column SF.jfry
  is '�Ʒ���Ա';
comment on column SF.jfrq
  is '�Ʒ�����';
comment on column SF.sfkmmc
  is '�շѿ�Ŀ����';
comment on column SF.sfewsf
  is '�Ƿ�����շ�';
comment on column SF.sfjs
  is '�շѻ���';
comment on column SF.sflx
  is '�շ�����';
comment on column SF.ysje
  is 'Ӧ�ս��';
comment on column SF.zkhysje
  is '�ۿۺ�Ӧ�ս��';
comment on column SF.sfry
  is '�շ���Ա';
comment on column SF.sfrq
  is '�շ�����';
comment on column SF.fff
  is '���ѷ�';
comment on column SF.sjffr
  is 'ʵ�ʸ�����';
comment on column SF.ssje
  is 'ʵ�ս��';
comment on column SF.sfdw
  is '�շѵ�λ';
alter table SF
  add constraint PK_SF primary key (YWH);

prompt
prompt Creating table SH
prompt =================
prompt
create table SH
(
  shid   NVARCHAR2(36),
  ywh    NVARCHAR2(36),
  ysdm   NVARCHAR2(10),
  jdmc   NVARCHAR2(50),
  sxh    NUMBER(15,2),
  shryxm NVARCHAR2(50),
  shkssj DATE,
  shjssj DATE,
  shyj   NVARCHAR2(1024),
  czjg   NVARCHAR2(2)
)
;
comment on table SH
  is '���';
comment on column SH.shid
  is '���ID';
comment on column SH.ywh
  is 'ҵ���';
comment on column SH.ysdm
  is 'Ҫ�ش���';
comment on column SH.jdmc
  is '�ڵ�����';
comment on column SH.sxh
  is '˳���';
comment on column SH.shryxm
  is '�����Ա����';
comment on column SH.shkssj
  is '��˿�ʼʱ��';
comment on column SH.shjssj
  is '��˽���ʱ��';
comment on column SH.shyj
  is '������';
comment on column SH.czjg
  is '�������';

prompt
prompt Creating table SJ
prompt =================
prompt
create table SJ
(
  sjid   NVARCHAR2(36) not null,
  fsjid  NVARCHAR2(36),
  ywgcbh NVARCHAR2(36),
  ysdm   NVARCHAR2(10),
  sjsj   DATE,
  sjlx   NVARCHAR2(4),
  sjmc   NVARCHAR2(1000),
  sjsl   INTEGER,
  sfsjsy NVARCHAR2(2),
  sfewsj NVARCHAR2(2),
  sfbcsj NVARCHAR2(2),
  ys     INTEGER,
  sjfl   NVARCHAR2(8),
  sjnr   BLOB,
  sjdx   INTEGER,
  ftplj  NVARCHAR2(200),
  bz     NVARCHAR2(1024),
  sjhz   NVARCHAR2(16)
)
;
comment on table SJ
  is '�ռ��嵥';
comment on column SJ.sjid
  is '�ռ�ID';
comment on column SJ.fsjid
  is '�ϼ��ռ�ID';
comment on column SJ.ywgcbh
  is 'ҵ����̱��';
comment on column SJ.ysdm
  is 'Ҫ�ش���';
comment on column SJ.sjsj
  is '�ռ�ʱ��';
comment on column SJ.sjlx
  is '�ռ�����';
comment on column SJ.sjmc
  is '�ռ�����';
comment on column SJ.sjsl
  is '�ռ�����';
comment on column SJ.sfsjsy
  is '�Ƿ��ս�����';
comment on column SJ.sfewsj
  is '�Ƿ�����ռ�';
comment on column SJ.sfbcsj
  is '�Ƿ񲹳��ռ�';
comment on column SJ.ys
  is 'ҳ��';
comment on column SJ.sjfl
  is '�ռ�����';
comment on column SJ.sjnr
  is '�ռ�����';
comment on column SJ.sjdx
  is '�ռ���С';
comment on column SJ.ftplj
  is 'FPT·��';
comment on column SJ.bz
  is '��ע';
comment on column SJ.sjhz
  is '�ռ���׺';
alter table SJ
  add constraint PK_SJ primary key (SJID);

prompt
prompt Creating table SLSQ
prompt ===================
prompt
create table SLSQ
(
  ywh     NVARCHAR2(43),
  ysdm    NVARCHAR2(10),
  ywgcbh  NVARCHAR2(43),
  djdl    NVARCHAR2(32),
  djxl    NVARCHAR2(200),
  sqzsbs  NVARCHAR2(16),
  sqfbcz  NVARCHAR2(16),
  qxdm    NVARCHAR2(16),
  slry    NVARCHAR2(50),
  slsj    DATE,
  zl      NVARCHAR2(2000),
  tzrxm   NVARCHAR2(106),
  tzfs    NVARCHAR2(2),
  tzrdh   NVARCHAR2(50),
  tzryddh NVARCHAR2(50),
  tzrdzyj NVARCHAR2(50),
  sfwtaj  NVARCHAR2(2),
  jssj    DATE,
  ajzt    NVARCHAR2(2),
  bz      NVARCHAR2(1024),
  htbh    NVARCHAR2(128),
  sjcrsj  DATE,
  wwsqbh  NVARCHAR2(36),
  wwyybh  NVARCHAR2(36),
  fcslh   NVARCHAR2(36)
)
;
comment on table SLSQ
  is '��������';
comment on column SLSQ.ywh
  is 'ҵ���';
comment on column SLSQ.ysdm
  is 'Ҫ�ش���';
comment on column SLSQ.ywgcbh
  is 'ҵ����̱��';
comment on column SLSQ.djdl
  is '�ǼǴ���';
comment on column SLSQ.djxl
  is '�Ǽ�С��';
comment on column SLSQ.sqzsbs
  is '����֤���ʽ';
comment on column SLSQ.sqfbcz
  is '����ֱ��֤';
comment on column SLSQ.qxdm
  is '���ش���';
comment on column SLSQ.slry
  is '������Ա';
comment on column SLSQ.slsj
  is '����ʱ��';
comment on column SLSQ.zl
  is '����';
comment on column SLSQ.tzrxm
  is '֪ͨ������';
comment on column SLSQ.tzfs
  is '֪ͨ��ʽ';
comment on column SLSQ.tzrdh
  is '֪ͨ�˵绰';
comment on column SLSQ.tzryddh
  is '֪ͨ���ƶ��绰';
comment on column SLSQ.tzrdzyj
  is '֪ͨ�˵����ʼ�';
comment on column SLSQ.sfwtaj
  is '�Ƿ����ⰸ��';
comment on column SLSQ.jssj
  is '����ʱ��';
comment on column SLSQ.ajzt
  is '����״̬';
comment on column SLSQ.bz
  is '��ע';
comment on column SLSQ.htbh
  is '�������׺�ͬ���';
comment on column SLSQ.sjcrsj
  is '���ݲ���ʱ��';
comment on column SLSQ.wwsqbh
  is '����������';
comment on column SLSQ.wwyybh
  is '����ԤԼ���';
comment on column SLSQ.fcslh
  is '���������';

prompt
prompt Creating table SZ
prompt =================
prompt
create table SZ
(
  ywh   NVARCHAR2(42),
  ysdm  NVARCHAR2(10),
  szmc  NVARCHAR2(50),
  szzh  NVARCHAR2(1024),
  ysxlh NVARCHAR2(1024),
  szry  NVARCHAR2(50),
  szsj  DATE,
  bz    NVARCHAR2(1024)
)
;
comment on table SZ
  is '��֤';
comment on column SZ.ywh
  is 'ҵ���';
comment on column SZ.ysdm
  is 'Ҫ�ش���';
comment on column SZ.szmc
  is '��֤����';
comment on column SZ.szzh
  is '��֤֤��';
comment on column SZ.ysxlh
  is 'ӡˢ���к�';
comment on column SZ.szry
  is '��֤��Ա';
comment on column SZ.szsj
  is '��֤ʱ��';
comment on column SZ.bz
  is '��ע';

prompt
prompt Creating table TDSYQ
prompt ====================
prompt
create table TDSYQ
(
  ywh     NVARCHAR2(36),
  ysdm    NVARCHAR2(10),
  zddm    NVARCHAR2(19),
  bdcdyh  NVARCHAR2(50),
  qllx    NVARCHAR2(32),
  djlx    NVARCHAR2(128),
  djyy    NVARCHAR2(128),
  mjdw    NVARCHAR2(2),
  nydmj   NUMBER(38,8),
  gdmj    NUMBER(38,8),
  ldmj    NUMBER(38,8),
  cdmj    NUMBER(38,8),
  qtnydmj NUMBER(38,8),
  jsydmj  NUMBER(38,8),
  wlydmj  NUMBER(38,8),
  bdcqzh  NVARCHAR2(1024),
  qxdm    NVARCHAR2(16),
  djjg    NVARCHAR2(200),
  dbr     NVARCHAR2(50),
  djsj    DATE,
  qlqtzk  NVARCHAR2(1024),
  fj      NVARCHAR2(1024),
  qszt    NVARCHAR2(2),
  zslx    NVARCHAR2(32)
)
;
comment on table TDSYQ
  is '��������Ȩ';
comment on column TDSYQ.ywh
  is 'ҵ���';
comment on column TDSYQ.ysdm
  is 'Ҫ�ش���';
comment on column TDSYQ.zddm
  is '�ڵش���';
comment on column TDSYQ.bdcdyh
  is '��������Ԫ��';
comment on column TDSYQ.qllx
  is 'Ȩ������';
comment on column TDSYQ.djlx
  is '�Ǽ�����';
comment on column TDSYQ.djyy
  is '�Ǽ�ԭ��';
comment on column TDSYQ.mjdw
  is '�����λ';
comment on column TDSYQ.nydmj
  is 'ũ�õ����';
comment on column TDSYQ.gdmj
  is '�������';
comment on column TDSYQ.ldmj
  is '�ֵ����';
comment on column TDSYQ.cdmj
  is '�ݵ����';
comment on column TDSYQ.qtnydmj
  is '����ũ�õ����';
comment on column TDSYQ.jsydmj
  is '�����õ����';
comment on column TDSYQ.wlydmj
  is 'δ���õ����';
comment on column TDSYQ.bdcqzh
  is '������Ȩ֤��';
comment on column TDSYQ.qxdm
  is '���ش���';
comment on column TDSYQ.djjg
  is '�Ǽǻ���';
comment on column TDSYQ.dbr
  is '�ǲ���';
comment on column TDSYQ.djsj
  is '�Ǽ�ʱ��';
comment on column TDSYQ.qlqtzk
  is 'Ȩ������״��';
comment on column TDSYQ.fj
  is '����';
comment on column TDSYQ.qszt
  is 'Ȩ��״̬';
comment on column TDSYQ.zslx
  is '֤������';

prompt
prompt Creating table WW_CXSQ
prompt ======================
prompt
create table WW_CXSQ
(
  sqbh    NVARCHAR2(36) not null,
  sqrq    DATE,
  sqr     NVARCHAR2(64),
  sqrzjhm NVARCHAR2(200),
  sqrzjlx NVARCHAR2(4),
  cxyt    NVARCHAR2(64),
  cxsm    NVARCHAR2(1024),
  blzt    NVARCHAR2(32),
  blwd    NVARCHAR2(128),
  lqfs    NVARCHAR2(64),
  sjr     NVARCHAR2(128),
  sjrdhhm NVARCHAR2(64),
  sjdz    NVARCHAR2(512),
  yb      NVARCHAR2(32),
  spr     NVARCHAR2(64),
  sprq    DATE,
  spyj    NVARCHAR2(1024),
  dccs    NVARCHAR2(32),
  spbz    NVARCHAR2(1024)
)
;
comment on table WW_CXSQ
  is '��ѯ����';
comment on column WW_CXSQ.sqbh
  is '������';
comment on column WW_CXSQ.sqrq
  is '��������';
comment on column WW_CXSQ.sqr
  is '������';
comment on column WW_CXSQ.sqrzjhm
  is '������֤����';
comment on column WW_CXSQ.sqrzjlx
  is '������֤������';
comment on column WW_CXSQ.cxyt
  is '��ѯ��;';
comment on column WW_CXSQ.cxsm
  is '��ѯ˵��';
comment on column WW_CXSQ.blzt
  is '����״̬';
comment on column WW_CXSQ.blwd
  is '��������';
comment on column WW_CXSQ.lqfs
  is '��ȡ��ʽ';
comment on column WW_CXSQ.sjr
  is '�ռ���';
comment on column WW_CXSQ.sjrdhhm
  is '�ռ��˵绰����';
comment on column WW_CXSQ.sjdz
  is '�ռ���ַ';
comment on column WW_CXSQ.yb
  is '�ʱ�';
comment on column WW_CXSQ.spr
  is '������';
comment on column WW_CXSQ.sprq
  is '��������';
comment on column WW_CXSQ.spyj
  is '�������';
comment on column WW_CXSQ.dccs
  is '��������';
comment on column WW_CXSQ.spbz
  is '������ע';
alter table WW_CXSQ
  add constraint PK_WW_CXSQ primary key (SQBH);

prompt
prompt Creating table WW_DJSQ
prompt ======================
prompt
create table WW_DJSQ
(
  sqbh    NVARCHAR2(36) not null,
  sqrq    DATE,
  djdl    NVARCHAR2(4),
  djxl    NVARCHAR2(200),
  sqzsbs  INTEGER,
  sqfbcz  INTEGER,
  qxdm    NVARCHAR2(6),
  spyj    NVARCHAR2(1024),
  spr     NVARCHAR2(64),
  spzt    NVARCHAR2(32),
  sprq    DATE,
  ajzt    NVARCHAR2(32),
  bz      NVARCHAR2(1024),
  sqr     NVARCHAR2(256),
  dccs    NVARCHAR2(32),
  blwd    NVARCHAR2(128),
  dycs    NVARCHAR2(36),
  htbh    NVARCHAR2(128),
  xgzh    NVARCHAR2(128),
  sfzsbd  NVARCHAR2(32),
  sfzsyx  NVARCHAR2(32),
  gyfs    NVARCHAR2(32),
  sqrsfzh NVARCHAR2(128),
  sqrdhhm NVARCHAR2(128),
  fsr     NVARCHAR2(64),
  fsyj    NVARCHAR2(1024),
  fsrq    DATE,
  dklx    NVARCHAR2(128),
  blwdid  NVARCHAR2(256),
  ywmx    NVARCHAR2(64)
)
;
comment on table WW_DJSQ
  is '�����Ǽ�����';
comment on column WW_DJSQ.sqbh
  is '������';
comment on column WW_DJSQ.sqrq
  is '��������';
comment on column WW_DJSQ.djdl
  is '�ǼǴ���';
comment on column WW_DJSQ.djxl
  is '�Ǽ�С��';
comment on column WW_DJSQ.sqzsbs
  is '����֤���ʽ';
comment on column WW_DJSQ.sqfbcz
  is '����ֱ��֤';
comment on column WW_DJSQ.qxdm
  is '���ش���';
comment on column WW_DJSQ.spyj
  is 'Ԥ�����';
comment on column WW_DJSQ.spr
  is 'Ԥ����';
comment on column WW_DJSQ.spzt
  is '����״̬';
comment on column WW_DJSQ.sprq
  is '��������';
comment on column WW_DJSQ.ajzt
  is '����״̬';
comment on column WW_DJSQ.bz
  is '��ע';
comment on column WW_DJSQ.sqr
  is '������';
comment on column WW_DJSQ.dccs
  is '��������';
comment on column WW_DJSQ.blwd
  is '��������';
comment on column WW_DJSQ.dycs
  is '��ӡ����';
comment on column WW_DJSQ.htbh
  is '��ͬ���';
comment on column WW_DJSQ.xgzh
  is '��ʼ֤��';
comment on column WW_DJSQ.sfzsbd
  is '�Ƿ���ʵ���';
comment on column WW_DJSQ.sfzsyx
  is '�Ƿ���ʵ��Ч';
comment on column WW_DJSQ.gyfs
  is '���з�ʽ';
comment on column WW_DJSQ.sqrsfzh
  is '������֤������';
comment on column WW_DJSQ.sqrdhhm
  is '�����˵绰����';
comment on column WW_DJSQ.fsr
  is '������';
comment on column WW_DJSQ.fsyj
  is '�������';
comment on column WW_DJSQ.fsrq
  is '��������';
comment on column WW_DJSQ.dklx
  is '��������';
comment on column WW_DJSQ.blwdid
  is '����ID';
comment on column WW_DJSQ.ywmx
  is 'ҵ��ģ��';
alter table WW_DJSQ
  add constraint PK_WW_DJSQ primary key (SQBH);

prompt
prompt Creating table WW_DYSQ
prompt ======================
prompt
create table WW_DYSQ
(
  sqbh      NVARCHAR2(36) not null,
  xgzh      NVARCHAR2(64),
  dylx      NVARCHAR2(64),
  dysw      INTEGER,
  zwr       NVARCHAR2(64),
  zwrzjlx   NVARCHAR2(2),
  zwrzjh    NVARCHAR2(36),
  dyfs      NVARCHAR2(32),
  dymj      NUMBER(38,8),
  zjjzwzl   NVARCHAR2(256),
  zjjzwdyfw NVARCHAR2(1024),
  bdbzzqse  NUMBER(38,8),
  pgje      NUMBER(38,8),
  dbfw      NVARCHAR2(256),
  zgzqqdss  NVARCHAR2(512),
  zgzqse    NUMBER(38,8),
  dyqx      NVARCHAR2(64),
  qlqssj    DATE,
  qljssj    DATE,
  bdcdyh    NVARCHAR2(36)
)
;
comment on table WW_DYSQ
  is '��Ѻ��ҵ������';
comment on column WW_DYSQ.sqbh
  is '������';
comment on column WW_DYSQ.xgzh
  is '��ز�����֤/֤����';
comment on column WW_DYSQ.dylx
  is '��Ѻ����';
comment on column WW_DYSQ.dysw
  is '��Ѻ˳λ';
comment on column WW_DYSQ.zwr
  is 'ծ����';
comment on column WW_DYSQ.zwrzjlx
  is 'ծ����֤������';
comment on column WW_DYSQ.zwrzjh
  is 'ծ����֤����';
comment on column WW_DYSQ.dyfs
  is '��Ѻ��ʽ';
comment on column WW_DYSQ.dymj
  is '��Ѻ���';
comment on column WW_DYSQ.zjjzwzl
  is '�ڽ�����������';
comment on column WW_DYSQ.zjjzwdyfw
  is '�ڽ��������Ѻ��Χ';
comment on column WW_DYSQ.bdbzzqse
  is '��������ծȨ����';
comment on column WW_DYSQ.pgje
  is '�����������۸�/���';
comment on column WW_DYSQ.dbfw
  is '������Χ';
comment on column WW_DYSQ.zgzqqdss
  is '���ծȨȷ����ʵ';
comment on column WW_DYSQ.zgzqse
  is '���ծȨ����';
comment on column WW_DYSQ.dyqx
  is '��Ѻ����';
comment on column WW_DYSQ.qlqssj
  is 'Ȩ����ʼʱ��';
comment on column WW_DYSQ.qljssj
  is 'Ȩ������ʱ��';
comment on column WW_DYSQ.bdcdyh
  is '��������Ԫ��';
alter table WW_DYSQ
  add constraint PK_WW_DYSQ primary key (SQBH);

prompt
prompt Creating table WW_FJQD
prompt ======================
prompt
create table WW_FJQD
(
  qdid   NVARCHAR2(32) not null,
  sqbh   NVARCHAR2(32),
  xh     NVARCHAR2(32),
  fjmc   NVARCHAR2(64),
  fjlx   NVARCHAR2(64),
  ftplj  NVARCHAR2(256),
  fjdx   NVARCHAR2(64),
  fjnr   BLOB,
  fjzt   NVARCHAR2(32),
  fjtjsj DATE,
  fjkzm  NVARCHAR2(8),
  fjml   NVARCHAR2(256)
)
;
comment on table WW_FJQD
  is '�����嵥';
comment on column WW_FJQD.qdid
  is '�嵥ID';
comment on column WW_FJQD.sqbh
  is '������';
comment on column WW_FJQD.xh
  is '���';
comment on column WW_FJQD.fjmc
  is '��������';
comment on column WW_FJQD.fjlx
  is '��������';
comment on column WW_FJQD.ftplj
  is '����·��';
comment on column WW_FJQD.fjdx
  is '������С';
comment on column WW_FJQD.fjnr
  is '��������';
comment on column WW_FJQD.fjzt
  is '����״̬';
comment on column WW_FJQD.fjtjsj
  is '�������ʱ��';
comment on column WW_FJQD.fjkzm
  is '������չ��';
comment on column WW_FJQD.fjml
  is '����Ŀ¼';
alter table WW_FJQD
  add constraint PK_WW_FJQD primary key (QDID);

prompt
prompt Creating table WW_QSSQ
prompt ======================
prompt
create table WW_QSSQ
(
  sqbh     NVARCHAR2(36) not null,
  xgzh     NVARCHAR2(512),
  bdcdyh   NVARCHAR2(36),
  fwbh     NVARCHAR2(24),
  zh       NVARCHAR2(4),
  hh       NVARCHAR2(4),
  dyh      NVARCHAR2(3),
  fjh      NVARCHAR2(16),
  gyfs     NVARCHAR2(64),
  gyfe     NVARCHAR2(64),
  qdjg     NUMBER(38,8),
  qdfs     NVARCHAR2(2),
  fwlx     NVARCHAR2(2),
  fwxz     NVARCHAR2(2),
  cg       NUMBER(38,8),
  sjcs     INTEGER,
  jzmj     NUMBER(38,8),
  tnjzmj   NUMBER(38,8),
  ftjzmj   NUMBER(38,8),
  qllx     NVARCHAR2(32),
  qlxz     NVARCHAR2(32),
  tdzzrq   DATE,
  tdyt     NVARCHAR2(32),
  tdsyqr   NVARCHAR2(64),
  gytdmj   NUMBER(38,8),
  fttdmj   NUMBER(38,8),
  dytdmj   NUMBER(38,8),
  tdsyqssj DATE,
  tdsyjssj DATE,
  fwzl     NVARCHAR2(256),
  syqx     NVARCHAR2(32),
  ghyt     NVARCHAR2(32),
  fdcjyjg  NUMBER(38,8)
)
;
comment on table WW_QSSQ
  is 'Ȩ֤��ҵ������';
comment on column WW_QSSQ.sqbh
  is '������';
comment on column WW_QSSQ.xgzh
  is '���֤��/֤����';
comment on column WW_QSSQ.bdcdyh
  is '��������Ԫ��';
comment on column WW_QSSQ.fwbh
  is '���ݱ��';
comment on column WW_QSSQ.zh
  is '����';
comment on column WW_QSSQ.hh
  is '����';
comment on column WW_QSSQ.dyh
  is '��Ԫ��';
comment on column WW_QSSQ.fjh
  is '�����';
comment on column WW_QSSQ.gyfs
  is '���з�ʽ';
comment on column WW_QSSQ.gyfe
  is '���зݶ�';
comment on column WW_QSSQ.qdjg
  is 'ȡ�ü۸�';
comment on column WW_QSSQ.qdfs
  is 'ȡ�÷�ʽ';
comment on column WW_QSSQ.fwlx
  is '��������';
comment on column WW_QSSQ.fwxz
  is '��������';
comment on column WW_QSSQ.cg
  is '���';
comment on column WW_QSSQ.sjcs
  is 'ʵ�ʲ���';
comment on column WW_QSSQ.jzmj
  is '�������';
comment on column WW_QSSQ.tnjzmj
  is '���ڽ������';
comment on column WW_QSSQ.ftjzmj
  is '��̯�������';
comment on column WW_QSSQ.qllx
  is 'Ȩ������';
comment on column WW_QSSQ.qlxz
  is 'Ȩ������';
comment on column WW_QSSQ.tdzzrq
  is '������ֹ����';
comment on column WW_QSSQ.tdyt
  is '������;';
comment on column WW_QSSQ.tdsyqr
  is '����ʹ��Ȩ��';
comment on column WW_QSSQ.gytdmj
  is '����ʹ�����';
comment on column WW_QSSQ.fttdmj
  is '��̯�������';
comment on column WW_QSSQ.dytdmj
  is '�����������';
comment on column WW_QSSQ.tdsyqssj
  is '����ʹ����ʼʱ��';
comment on column WW_QSSQ.tdsyjssj
  is '����ʹ�ý���ʱ��';
comment on column WW_QSSQ.fwzl
  is '��������';
comment on column WW_QSSQ.syqx
  is 'ʹ������';
comment on column WW_QSSQ.ghyt
  is '�滮��;';
comment on column WW_QSSQ.fdcjyjg
  is '���ز����׼۸�';
alter table WW_QSSQ
  add constraint PK_WW_QSSQ primary key (SQBH);

prompt
prompt Creating table WW_SMFWSQ
prompt ========================
prompt
create table WW_SMFWSQ
(
  sqbh    NVARCHAR2(36) not null,
  sqrq    DATE,
  sqrid   NVARCHAR2(64),
  sqrzjhm NVARCHAR2(64),
  sqrdhhm NVARCHAR2(64),
  sqrxm   NVARCHAR2(128),
  xblyw   NVARCHAR2(128),
  sqyy    NVARCHAR2(1024),
  dz      NVARCHAR2(1024),
  spzt    NVARCHAR2(64),
  spr     NVARCHAR2(64),
  sprq    DATE,
  spyj    NVARCHAR2(1024),
  dccs    NVARCHAR2(64),
  spbz    NVARCHAR2(1024)
)
;
comment on table WW_SMFWSQ
  is '���ŷ�������';
comment on column WW_SMFWSQ.sqbh
  is '������';
comment on column WW_SMFWSQ.sqrq
  is '��������';
comment on column WW_SMFWSQ.sqrid
  is '������ID';
comment on column WW_SMFWSQ.sqrzjhm
  is '������֤������';
comment on column WW_SMFWSQ.sqrdhhm
  is '�����˵绰����';
comment on column WW_SMFWSQ.sqrxm
  is '����������';
comment on column WW_SMFWSQ.xblyw
  is '�����ҵ��';
comment on column WW_SMFWSQ.sqyy
  is '����ԭ��';
comment on column WW_SMFWSQ.dz
  is '���ŷ����ַ';
comment on column WW_SMFWSQ.spzt
  is '����״̬';
comment on column WW_SMFWSQ.spr
  is '������';
comment on column WW_SMFWSQ.sprq
  is '��������';
comment on column WW_SMFWSQ.spyj
  is '�������';
comment on column WW_SMFWSQ.dccs
  is '��������';
comment on column WW_SMFWSQ.spbz
  is '������ע';
alter table WW_SMFWSQ
  add constraint PK_WW_SMFWSQ primary key (SQBH);

prompt
prompt Creating table WW_SQRXX
prompt =======================
prompt
create table WW_SQRXX
(
  glbh  NVARCHAR2(36) not null,
  sqbh  NVARCHAR2(36),
  sqrmc NVARCHAR2(256),
  zjlb  NVARCHAR2(2),
  zjhm  NVARCHAR2(36),
  dh    NVARCHAR2(32),
  yb    NVARCHAR2(16),
  dz    NVARCHAR2(256),
  sqrlx NVARCHAR2(32),
  sxh   INTEGER,
  gyfe  NVARCHAR2(64)
)
;
comment on table WW_SQRXX
  is '��������Ϣ';
comment on column WW_SQRXX.glbh
  is '�������';
comment on column WW_SQRXX.sqbh
  is 'ҵ����';
comment on column WW_SQRXX.sqrmc
  is '����������';
comment on column WW_SQRXX.zjlb
  is '֤�����';
comment on column WW_SQRXX.zjhm
  is '֤������';
comment on column WW_SQRXX.dh
  is '�绰';
comment on column WW_SQRXX.yb
  is '�ʱ�';
comment on column WW_SQRXX.dz
  is '��ַ';
comment on column WW_SQRXX.sqrlx
  is '����������';
comment on column WW_SQRXX.sxh
  is '˳���';
comment on column WW_SQRXX.gyfe
  is '���зݶ�';
alter table WW_SQRXX
  add constraint PK_WW_SQRXX primary key (GLBH);

prompt
prompt Creating table WW_TSGL
prompt ======================
prompt
create table WW_TSGL
(
  glbm   NVARCHAR2(36) not null,
  sqbh   NVARCHAR2(36),
  bdclx  NVARCHAR2(36),
  tstybm NVARCHAR2(36),
  bdcdyh NVARCHAR2(36),
  djzl   NVARCHAR2(36),
  glms   NVARCHAR2(32),
  cssj   DATE
)
;
comment on table WW_TSGL
  is 'ͼ������';
comment on column WW_TSGL.glbm
  is '��������';
comment on column WW_TSGL.sqbh
  is '������';
comment on column WW_TSGL.bdclx
  is '����������';
comment on column WW_TSGL.tstybm
  is '������ͼ��ͳһ����';
comment on column WW_TSGL.bdcdyh
  is '��������Ԫ��';
comment on column WW_TSGL.djzl
  is '�Ǽ�����';
comment on column WW_TSGL.glms
  is '����ģʽ';
comment on column WW_TSGL.cssj
  is '����ʱ��';
alter table WW_TSGL
  add constraint PK_WW_TSGL primary key (GLBM);

prompt
prompt Creating table WW_TSJY
prompt ======================
prompt
create table WW_TSJY
(
  bh      NVARCHAR2(36) not null,
  tjrq    DATE,
  tjrid   NVARCHAR2(64),
  tjrzjhm NVARCHAR2(64),
  tjrdhhm NVARCHAR2(64),
  tjrxm   NVARCHAR2(128),
  nr      NVARCHAR2(1024),
  sfsy    NVARCHAR2(64)
)
;
comment on table WW_TSJY
  is 'Ͷ���뽨��';
comment on column WW_TSJY.bh
  is '���';
comment on column WW_TSJY.tjrq
  is '�ύ����';
comment on column WW_TSJY.tjrid
  is '�ύ��ID';
comment on column WW_TSJY.tjrzjhm
  is '�ύ��֤������';
comment on column WW_TSJY.tjrdhhm
  is '�ύ�˵绰����';
comment on column WW_TSJY.tjrxm
  is '�ύ������';
comment on column WW_TSJY.nr
  is '����';
comment on column WW_TSJY.sfsy
  is '�Ƿ�����';
alter table WW_TSJY
  add constraint PK_WW_TSJY primary key (BH);

prompt
prompt Creating table WW_YYJHC
prompt =======================
prompt
create table WW_YYJHC
(
  jhcid NVARCHAR2(36) not null,
  bsid  NVARCHAR2(36),
  yyrq  DATE,
  blwd  NVARCHAR2(128),
  sjd   NVARCHAR2(64),
  qssj  DATE,
  jssj  DATE,
  djdl  NVARCHAR2(64),
  qz    NVARCHAR2(4),
  bh    INTEGER,
  zt    INTEGER,
  bz    NVARCHAR2(128),
  czsj  DATE
)
;
comment on table WW_YYJHC
  is '����ԤԼ�кų�';
comment on column WW_YYJHC.jhcid
  is '����ID';
comment on column WW_YYJHC.bsid
  is '�кű�ʶ';
comment on column WW_YYJHC.yyrq
  is 'ԤԼ����';
comment on column WW_YYJHC.blwd
  is '��������';
comment on column WW_YYJHC.sjd
  is 'ʱ���';
comment on column WW_YYJHC.qssj
  is '��ʼʱ��';
comment on column WW_YYJHC.jssj
  is '����ʱ��';
comment on column WW_YYJHC.djdl
  is '�ǼǴ���';
comment on column WW_YYJHC.qz
  is 'ǰ׺';
comment on column WW_YYJHC.bh
  is 'ԤԼ���';
comment on column WW_YYJHC.zt
  is '���״̬';
comment on column WW_YYJHC.bz
  is '��ע';
comment on column WW_YYJHC.czsj
  is '���һ�β���ʱ��';
alter table WW_YYJHC
  add constraint PK_WW_YYJHC primary key (JHCID);

prompt
prompt Creating table WW_YYZH
prompt ======================
prompt
create table WW_YYZH
(
  zhid  NVARCHAR2(36) not null,
  blwd  NVARCHAR2(64),
  blsjd NVARCHAR2(32),
  djdl  NVARCHAR2(36),
  ywlx  NVARCHAR2(36),
  kyyrq NVARCHAR2(64),
  kyyzs INTEGER,
  zhs   INTEGER,
  sffqh NVARCHAR2(2),
  sftsh NVARCHAR2(2),
  czr   NVARCHAR2(36)
)
;
comment on table WW_YYZH
  is 'ԤԼռ��';
comment on column WW_YYZH.zhid
  is '����';
comment on column WW_YYZH.blwd
  is '��������';
comment on column WW_YYZH.blsjd
  is '����ʱ���';
comment on column WW_YYZH.djdl
  is '�ǼǴ���';
comment on column WW_YYZH.ywlx
  is 'ҵ������';
comment on column WW_YYZH.kyyrq
  is '��ԤԼ����';
comment on column WW_YYZH.kyyzs
  is '��ԤԼ����';
comment on column WW_YYZH.zhs
  is 'ռ������';
comment on column WW_YYZH.sffqh
  is '�Ƿ������';
comment on column WW_YYZH.sftsh
  is '�Ƿ������';
comment on column WW_YYZH.czr
  is '������';
alter table WW_YYZH
  add constraint PK_WW_YYZH primary key (ZHID);

prompt
prompt Creating table WW_ZSYZ
prompt ======================
prompt
create table WW_ZSYZ
(
  cxbh   NVARCHAR2(36) not null,
  cxrq   DATE,
  cxrxm  NVARCHAR2(64),
  cxfs   NVARCHAR2(64),
  bdczl  NVARCHAR2(128),
  bdczsh NVARCHAR2(256),
  qlrmc  NVARCHAR2(256),
  bdcdyh NVARCHAR2(64),
  syqx   NVARCHAR2(128)
)
;
comment on table WW_ZSYZ
  is '֤����֤';
comment on column WW_ZSYZ.cxbh
  is '��ѯ���';
comment on column WW_ZSYZ.cxrq
  is '��ѯ����';
comment on column WW_ZSYZ.cxrxm
  is '��ѯ������';
comment on column WW_ZSYZ.cxfs
  is '��ѯ��ʽ';
comment on column WW_ZSYZ.bdczl
  is '���в�����';
comment on column WW_ZSYZ.bdczsh
  is '���в�֤��';
comment on column WW_ZSYZ.qlrmc
  is 'Ȩ����';
comment on column WW_ZSYZ.bdcdyh
  is '���в���Ԫ��';
comment on column WW_ZSYZ.syqx
  is 'ʹ������';
alter table WW_ZSYZ
  add constraint PK_WW_ZSYZ primary key (CXBH);

prompt
prompt Creating table WW_ZXYY
prompt ======================
prompt
create table WW_ZXYY
(
  sqbh    NVARCHAR2(36) not null,
  yysqrq  DATE,
  yyrxm   NVARCHAR2(64),
  yyrzjhm NVARCHAR2(64),
  yyrdhhm NVARCHAR2(32),
  ywlx    INTEGER,
  sldw    NVARCHAR2(64),
  bdcszq  NVARCHAR2(128),
  fdcmc   NVARCHAR2(256),
  qszmlx  NVARCHAR2(256),
  qszmh   NVARCHAR2(128),
  yysj    DATE,
  yybh    NVARCHAR2(64),
  yyzt    NVARCHAR2(32),
  dccs    NVARCHAR2(32),
  yydlr   NVARCHAR2(64),
  djlx    NVARCHAR2(128),
  yyxh    NVARCHAR2(32),
  yyrcode NVARCHAR2(32),
  yysjd   NVARCHAR2(64),
  ywlxid  NVARCHAR2(32),
  djdlid  NVARCHAR2(32),
  sftsh   NVARCHAR2(2),
  sysname NVARCHAR2(36),
  keynum  NVARCHAR2(36),
  yynum   NVARCHAR2(36),
  sjd     NVARCHAR2(36),
  qssj    DATE,
  jssj    DATE,
  qxr     NVARCHAR2(36),
  qxsj    DATE
)
;
comment on table WW_ZXYY
  is '����ԤԼ';
comment on column WW_ZXYY.sqbh
  is '������';
comment on column WW_ZXYY.yysqrq
  is 'ԤԼ��������';
comment on column WW_ZXYY.yyrxm
  is 'ԤԼ������';
comment on column WW_ZXYY.yyrzjhm
  is 'ԤԼ��֤����';
comment on column WW_ZXYY.yyrdhhm
  is 'ԤԼ�˵绰����';
comment on column WW_ZXYY.ywlx
  is 'ҵ������';
comment on column WW_ZXYY.sldw
  is '����λ';
comment on column WW_ZXYY.bdcszq
  is '������������';
comment on column WW_ZXYY.fdcmc
  is '���ز�����';
comment on column WW_ZXYY.qszmlx
  is 'Ȩ��֤������';
comment on column WW_ZXYY.qszmh
  is 'Ȩ��֤����';
comment on column WW_ZXYY.yysj
  is 'ԤԼʱ��';
comment on column WW_ZXYY.yybh
  is 'ԤԼ���';
comment on column WW_ZXYY.yyzt
  is 'ԤԼ״̬';
comment on column WW_ZXYY.dccs
  is '��������';
comment on column WW_ZXYY.yydlr
  is 'ԤԼ������';
comment on column WW_ZXYY.djlx
  is '�Ǽ�����';
comment on column WW_ZXYY.yyxh
  is 'ԤԼ���';
comment on column WW_ZXYY.yyrcode
  is 'ԤԼ��usercode';
comment on column WW_ZXYY.yysjd
  is 'ԤԼʱ���';
comment on column WW_ZXYY.ywlxid
  is 'ҵ������ID';
comment on column WW_ZXYY.djdlid
  is 'ҵ�����ID';
comment on column WW_ZXYY.sftsh
  is '�Ƿ�����ţ���/��';
comment on column WW_ZXYY.sysname
  is '�к�����';
comment on column WW_ZXYY.keynum
  is '�к�ֵ';
comment on column WW_ZXYY.yynum
  is '�кŴ�����ԤԼ��';
comment on column WW_ZXYY.sjd
  is 'ԤԼʱ���ID';
comment on column WW_ZXYY.qssj
  is 'ʱ�����ʼʱ��';
comment on column WW_ZXYY.jssj
  is 'ʱ��ν���ʱ��';
comment on column WW_ZXYY.qxr
  is 'ԤԼȡ����';
comment on column WW_ZXYY.qxsj
  is 'ԤԼȡ��ʱ��';
alter table WW_ZXYY
  add constraint PK_WW_ZXYY primary key (SQBH);

prompt
prompt Creating table XGDJGL
prompt =====================
prompt
create table XGDJGL
(
  bgbm NVARCHAR2(38),
  zywh NVARCHAR2(45),
  fywh NVARCHAR2(43),
  bgrq DATE,
  bglx NVARCHAR2(36)
)
;
comment on table XGDJGL
  is '��صǼǹ���';
comment on column XGDJGL.bgbm
  is '�������';
comment on column XGDJGL.zywh
  is '��ҵ���';
comment on column XGDJGL.fywh
  is '��ҵ���';
comment on column XGDJGL.bgrq
  is '�������';
comment on column XGDJGL.bglx
  is '�������';

prompt
prompt Creating table YGDJ
prompt ===================
prompt
create table YGDJ
(
  ywh      NVARCHAR2(43),
  ysdm     NVARCHAR2(10),
  bdcdyh   NVARCHAR2(50),
  bdczl    NVARCHAR2(1000),
  ywr      NVARCHAR2(2000),
  ywrzjzl  NVARCHAR2(10),
  ywrzjh   NVARCHAR2(200),
  ygdjzl   NVARCHAR2(36),
  djlx     NVARCHAR2(128),
  djyy     NVARCHAR2(128),
  tdsyqr   NVARCHAR2(50),
  ghyt     NVARCHAR2(32),
  fwxz     NVARCHAR2(4),
  fwjg     NVARCHAR2(32),
  szc      NVARCHAR2(50),
  zcs      NUMBER(15,2),
  jzmj     NUMBER(38,8),
  qdjg     NUMBER(38,8),
  bdcdjzmh NVARCHAR2(1024),
  qxdm     NVARCHAR2(16),
  djjg     NVARCHAR2(200),
  dbr      NVARCHAR2(50),
  djsj     DATE,
  qlqtzk   NVARCHAR2(1024),
  fj       NVARCHAR2(1024),
  qszt     NVARCHAR2(2),
  ytmc     NVARCHAR2(1999),
  fwxzmc   NVARCHAR2(1999),
  zxygywh  NVARCHAR2(36),
  zxygyy   NVARCHAR2(1999),
  zxsj     DATE
)
;
comment on table YGDJ
  is 'Ԥ��Ǽ�';
comment on column YGDJ.ywh
  is 'ҵ���';
comment on column YGDJ.ysdm
  is 'Ҫ�ش���';
comment on column YGDJ.bdcdyh
  is '��������Ԫ��';
comment on column YGDJ.bdczl
  is '����������';
comment on column YGDJ.ywr
  is '������';
comment on column YGDJ.ywrzjzl
  is '������֤������';
comment on column YGDJ.ywrzjh
  is '������֤����';
comment on column YGDJ.ygdjzl
  is 'Ԥ��Ǽ�����';
comment on column YGDJ.djlx
  is '�Ǽ�����';
comment on column YGDJ.djyy
  is '�Ǽ�ԭ��';
comment on column YGDJ.tdsyqr
  is '����ʹ��Ȩ��';
comment on column YGDJ.ghyt
  is '�滮��;';
comment on column YGDJ.fwxz
  is '��������';
comment on column YGDJ.fwjg
  is '���ݽṹ';
comment on column YGDJ.szc
  is '���ڲ�';
comment on column YGDJ.zcs
  is '�ܲ���';
comment on column YGDJ.jzmj
  is '�������';
comment on column YGDJ.qdjg
  is 'ȡ�ü۸�/��������ծȨ����';
comment on column YGDJ.bdcdjzmh
  is '�������Ǽ�֤����';
comment on column YGDJ.qxdm
  is '���ش���';
comment on column YGDJ.djjg
  is '�Ǽǻ���';
comment on column YGDJ.dbr
  is '�ǲ���';
comment on column YGDJ.djsj
  is '�Ǽ�ʱ��';
comment on column YGDJ.qlqtzk
  is 'Ȩ������״��';
comment on column YGDJ.fj
  is '����';
comment on column YGDJ.qszt
  is 'Ȩ��״̬';
comment on column YGDJ.ytmc
  is '��;����';
comment on column YGDJ.fwxzmc
  is '������������';
comment on column YGDJ.zxygywh
  is 'ע��Ԥ��ҵ���';
comment on column YGDJ.zxygyy
  is 'ע��Ԥ��ԭ��';
comment on column YGDJ.zxsj
  is 'ע��ʱ��';

prompt
prompt Creating table YHZK
prompt ===================
prompt
create table YHZK
(
  zdid  NVARCHAR2(36) not null,
  zhdm  NVARCHAR2(19),
  yhfs  NVARCHAR2(2),
  yhmj  NUMBER(38,8),
  jtyt  NVARCHAR2(500),
  syjse NUMBER(38,8)
)
;
comment on table YHZK
  is '�ú�״��';
comment on column YHZK.zdid
  is '�ں�ID';
comment on column YHZK.zhdm
  is '�ں�����';
comment on column YHZK.yhfs
  is '�ú���ʽ';
comment on column YHZK.yhmj
  is '�ú����';
comment on column YHZK.jtyt
  is '������;';
comment on column YHZK.syjse
  is 'ʹ�ý�����';
alter table YHZK
  add constraint PK_YHZK primary key (ZDID);

prompt
prompt Creating table YSXK
prompt ===================
prompt
create table YSXK
(
  xkbh          NVARCHAR2(36) not null,
  xkzh          NVARCHAR2(100),
  gsmc          NVARCHAR2(200),
  xmmc          NVARCHAR2(100),
  xmbh          NVARCHAR2(36),
  yjjgmj        NUMBER(38,8),
  yjjgts        INTEGER,
  yjjgrq        DATE,
  fwlx          NVARCHAR2(16),
  jzlx          NVARCHAR2(16),
  jzjg          NVARCHAR2(16),
  fwzh          NVARCHAR2(20),
  cs            INTEGER,
  ts            INTEGER,
  zjzmj         NUMBER(38,8),
  xkmj          NUMBER(38,8),
  xkts          INTEGER,
  xsksrq        DATE,
  xsjsrq        DATE,
  pzyszfmj      NUMBER(38,8),
  zfyssbpjjg    NUMBER(38,8),
  pzyssyyyyfzmj NUMBER(38,8),
  syyyyfsbpjjg  NUMBER(38,8),
  pzysbglzmj    NUMBER(38,8),
  bglyssbpjjg   NUMBER(38,8),
  pzysqtfwzmj   NUMBER(38,8),
  qtfwsbpjjg    NUMBER(38,8),
  yxkzh         NVARCHAR2(100),
  ssjc          NVARCHAR2(36),
  jgjc          NVARCHAR2(36),
  fznd          NVARCHAR2(4),
  zsh           NVARCHAR2(256),
  djrq          DATE,
  fddbr         NVARCHAR2(256),
  xmdz          NVARCHAR2(256),
  ghyt          NVARCHAR2(256),
  bz            NVARCHAR2(2000),
  spbz          NVARCHAR2(1024),
  qszt          NVARCHAR2(2)
)
;
comment on table YSXK
  is '����Ԥ�����';
comment on column YSXK.xkbh
  is '��ɱ��';
comment on column YSXK.xkzh
  is '���֤��';
comment on column YSXK.gsmc
  is '��˾����';
comment on column YSXK.xmmc
  is '��Ŀ����';
comment on column YSXK.xmbh
  is '��Ŀ���';
comment on column YSXK.yjjgmj
  is 'Ԥ�ƿ������';
comment on column YSXK.yjjgts
  is 'Ԥ�ƿ�������';
comment on column YSXK.yjjgrq
  is 'Ԥ�ƿ�������';
comment on column YSXK.fwlx
  is '��������';
comment on column YSXK.jzlx
  is '��������';
comment on column YSXK.jzjg
  is '�����ṹ';
comment on column YSXK.fwzh
  is '���ݴ���';
comment on column YSXK.cs
  is '����';
comment on column YSXK.ts
  is '����';
comment on column YSXK.zjzmj
  is '�ܽ������';
comment on column YSXK.xkmj
  is '������';
comment on column YSXK.xkts
  is '�������';
comment on column YSXK.xsksrq
  is '���ۿ�ʼ����';
comment on column YSXK.xsjsrq
  is '���۽�������';
comment on column YSXK.pzyszfmj
  is '��׼Ԥ��ס�����';
comment on column YSXK.zfyssbpjjg
  is 'ס��Ԥ���걨ƽ���۸�';
comment on column YSXK.pzyssyyyyfzmj
  is '��׼Ԥ����ҵӪҵ�÷������';
comment on column YSXK.syyyyfsbpjjg
  is '��ҵӪҵ�÷��걨ƽ���۸�';
comment on column YSXK.pzysbglzmj
  is '��׼Ԥ�۰칫¥�����';
comment on column YSXK.bglyssbpjjg
  is '�칫¥Ԥ���걨ƽ���۸�';
comment on column YSXK.pzysqtfwzmj
  is '��׼Ԥ���������������';
comment on column YSXK.qtfwsbpjjg
  is '���������걨ƽ���۸�';
comment on column YSXK.yxkzh
  is 'ԭ���֤��';
comment on column YSXK.ssjc
  is 'ʡ�м��';
comment on column YSXK.jgjc
  is '�������';
comment on column YSXK.fznd
  is '��֤���';
comment on column YSXK.zsh
  is '֤���';
comment on column YSXK.djrq
  is '�Ǽ�����';
comment on column YSXK.fddbr
  is '����������';
comment on column YSXK.xmdz
  is '��Ŀ��ַ';
comment on column YSXK.ghyt
  is '�滮��;';
comment on column YSXK.bz
  is '��ע';
comment on column YSXK.spbz
  is '������ע';
comment on column YSXK.qszt
  is 'Ȩ��״̬';
alter table YSXK
  add constraint PK_YSXK primary key (XKBH);

prompt
prompt Creating table YYDJ
prompt ===================
prompt
create table YYDJ
(
  ywh      NVARCHAR2(36),
  ysdm     NVARCHAR2(10),
  bdcdyh   NVARCHAR2(50),
  yysx     NVARCHAR2(128),
  bdcdjzmh NVARCHAR2(1024),
  qxdm     NVARCHAR2(50),
  djjg     NVARCHAR2(200),
  dbr      NVARCHAR2(50),
  djsj     DATE,
  zxyyywh  NVARCHAR2(20),
  zxyyyy   NVARCHAR2(128),
  zxyydbr  NVARCHAR2(50),
  zxyydjsj DATE,
  qlqtzk   NVARCHAR2(1024),
  fj       NVARCHAR2(1024),
  qszt     NVARCHAR2(2)
)
;
comment on table YYDJ
  is '����Ǽ�';
comment on column YYDJ.ywh
  is 'ҵ���';
comment on column YYDJ.ysdm
  is 'Ҫ�ش���';
comment on column YYDJ.bdcdyh
  is '��������Ԫ��';
comment on column YYDJ.yysx
  is '��������';
comment on column YYDJ.bdcdjzmh
  is '�������Ǽ�֤����';
comment on column YYDJ.qxdm
  is '���ش���';
comment on column YYDJ.djjg
  is '�Ǽǻ���';
comment on column YYDJ.dbr
  is '�ǲ���';
comment on column YYDJ.djsj
  is '�Ǽ�ʱ��';
comment on column YYDJ.zxyyywh
  is 'ע������ҵ���';
comment on column YYDJ.zxyyyy
  is 'ע������ԭ��';
comment on column YYDJ.zxyydbr
  is 'ע������ǲ���';
comment on column YYDJ.zxyydjsj
  is 'ע������Ǽ�ʱ��';
comment on column YYDJ.qlqtzk
  is 'Ȩ������״��';
comment on column YYDJ.fj
  is '����';
comment on column YYDJ.qszt
  is 'Ȩ��״̬';

prompt
prompt Creating table ZDJBXX
prompt =====================
prompt
create table ZDJBXX
(
  zdid   NVARCHAR2(36),
  bsm    INTEGER,
  ysdm   NVARCHAR2(10),
  zddm   NVARCHAR2(19),
  bdcdyh NVARCHAR2(28),
  zdtzm  NVARCHAR2(2),
  zl     NVARCHAR2(2000),
  zdmj   NUMBER(38,8),
  mjdw   NVARCHAR2(2),
  yt     NVARCHAR2(32),
  ytmc   NVARCHAR2(100),
  dj     NVARCHAR2(16),
  jg     NUMBER(38,8),
  qllx   NVARCHAR2(32),
  qlxz   NVARCHAR2(32),
  qlsdfs NVARCHAR2(2),
  rjl    NVARCHAR2(50),
  jzmd   NUMBER(38,8),
  jzxg   NUMBER(38,8),
  zdszd  NVARCHAR2(1200),
  zdszn  NVARCHAR2(1200),
  zdszx  NVARCHAR2(1200),
  zdszb  NVARCHAR2(1200),
  zdt    BLOB,
  tfh    NVARCHAR2(239),
  djh    NVARCHAR2(20),
  dah    NVARCHAR2(128),
  bz     NVARCHAR2(1024),
  zt     NVARCHAR2(2),
  isrghs NVARCHAR2(2),
  rghsry NVARCHAR2(50),
  rghsrq DATE,
  dcsj   DATE,
  bgjzxx NVARCHAR2(128),
  bgtsxx NVARCHAR2(128)
)
;
comment on table ZDJBXX
  is '�ڵػ�����Ϣ';
comment on column ZDJBXX.zdid
  is '�ڵ�ID';
comment on column ZDJBXX.bsm
  is '��ʶ��';
comment on column ZDJBXX.ysdm
  is 'Ҫ�ش���';
comment on column ZDJBXX.zddm
  is '�ڵش���';
comment on column ZDJBXX.bdcdyh
  is '��������Ԫ��';
comment on column ZDJBXX.zdtzm
  is '�ڵ�������';
comment on column ZDJBXX.zl
  is '����';
comment on column ZDJBXX.zdmj
  is '�ڵ����';
comment on column ZDJBXX.mjdw
  is '�����λ';
comment on column ZDJBXX.yt
  is '��;';
comment on column ZDJBXX.ytmc
  is '��;����';
comment on column ZDJBXX.dj
  is '�ȼ�';
comment on column ZDJBXX.jg
  is '�۸�';
comment on column ZDJBXX.qllx
  is 'Ȩ������';
comment on column ZDJBXX.qlxz
  is 'Ȩ������';
comment on column ZDJBXX.qlsdfs
  is 'Ȩ���趨��ʽ';
comment on column ZDJBXX.rjl
  is '�ݻ���';
comment on column ZDJBXX.jzmd
  is '�����ܶ�';
comment on column ZDJBXX.jzxg
  is '�����޸�';
comment on column ZDJBXX.zdszd
  is '�ڵ�����-��';
comment on column ZDJBXX.zdszn
  is '�ڵ�����-��';
comment on column ZDJBXX.zdszx
  is '�ڵ�����-��';
comment on column ZDJBXX.zdszb
  is '�ڵ�����-��';
comment on column ZDJBXX.zdt
  is '�ڵ�ͼ';
comment on column ZDJBXX.tfh
  is 'ͼ����';
comment on column ZDJBXX.djh
  is '�ؼ���';
comment on column ZDJBXX.dah
  is '������';
comment on column ZDJBXX.bz
  is '��ע';
comment on column ZDJBXX.zt
  is '״̬';
comment on column ZDJBXX.isrghs
  is '�Ƿ��˹���ʵ';
comment on column ZDJBXX.rghsry
  is '�˹���ʵ��Ա';
comment on column ZDJBXX.rghsrq
  is '�˹���ʵ����';
comment on column ZDJBXX.dcsj
  is '����ʱ��';
comment on column ZDJBXX.bgjzxx
  is '�����ֹ��Ϣ';
comment on column ZDJBXX.bgtsxx
  is '�����ʾ��Ϣ';

prompt
prompt Creating table ZHJBXX
prompt =====================
prompt
create table ZHJBXX
(
  zhid   NVARCHAR2(36) not null,
  bsm    INTEGER,
  ysdm   NVARCHAR2(10),
  zhdm   NVARCHAR2(19),
  bdcdyh NVARCHAR2(28),
  zhtzm  NVARCHAR2(2),
  xmmc   NVARCHAR2(100),
  xmxz   NVARCHAR2(2),
  yhzmj  NUMBER(38,8),
  zhmj   NUMBER(38,8),
  db     NVARCHAR2(2),
  zhax   NUMBER(38,8),
  yhlxa  NVARCHAR2(2),
  yhlxb  NVARCHAR2(2),
  yhwzsm NVARCHAR2(1024),
  hdmc   NVARCHAR2(100),
  hddm   NVARCHAR2(19),
  ydfw   NVARCHAR2(200),
  ydmj   NUMBER(38,8),
  hdwz   NVARCHAR2(1024),
  hdyt   NVARCHAR2(2),
  hdytmc NVARCHAR2(100),
  zht    BLOB,
  dah    NVARCHAR2(128),
  zt     NVARCHAR2(2),
  dcsj   DATE
)
;
comment on table ZHJBXX
  is '�ں�������Ϣ';
comment on column ZHJBXX.zhid
  is '�ں�ID';
comment on column ZHJBXX.bsm
  is '��ʶ��';
comment on column ZHJBXX.ysdm
  is 'Ҫ�ش���';
comment on column ZHJBXX.zhdm
  is '�ں�����';
comment on column ZHJBXX.bdcdyh
  is '��������Ԫ��';
comment on column ZHJBXX.zhtzm
  is '�ں�������';
comment on column ZHJBXX.xmmc
  is '��Ŀ����';
comment on column ZHJBXX.xmxz
  is '��Ŀ����';
comment on column ZHJBXX.yhzmj
  is '�ú������';
comment on column ZHJBXX.zhmj
  is '�ں����';
comment on column ZHJBXX.db
  is '�ȱ�';
comment on column ZHJBXX.zhax
  is 'ռ������';
comment on column ZHJBXX.yhlxa
  is '�ú�����A';
comment on column ZHJBXX.yhlxb
  is '�ú�����B';
comment on column ZHJBXX.yhwzsm
  is '�ú�λ��˵��';
comment on column ZHJBXX.hdmc
  is '��������';
comment on column ZHJBXX.hddm
  is '��������';
comment on column ZHJBXX.ydfw
  is '�õ���Χ';
comment on column ZHJBXX.ydmj
  is '�õ����';
comment on column ZHJBXX.hdwz
  is '����λ��';
comment on column ZHJBXX.hdyt
  is '������;';
comment on column ZHJBXX.hdytmc
  is '������;����';
comment on column ZHJBXX.zht
  is '�ں�ͼ';
comment on column ZHJBXX.dah
  is '������';
comment on column ZHJBXX.zt
  is '״̬';
comment on column ZHJBXX.dcsj
  is '����ʱ��';
alter table ZHJBXX
  add constraint PK_ZHJBXX primary key (ZHID);

prompt
prompt Creating table ZXDJ
prompt ===================
prompt
create table ZXDJ
(
  zxywh  NVARCHAR2(41),
  ysdm   NVARCHAR2(10),
  bdcdyh NVARCHAR2(50),
  bdcqz  NVARCHAR2(1024),
  ywh    NVARCHAR2(41),
  qxdm   NVARCHAR2(16),
  djjg   NVARCHAR2(200),
  dbr    NVARCHAR2(50),
  djsj   DATE,
  qlqtzk NVARCHAR2(1024),
  djyy   NVARCHAR2(128),
  fj     NVARCHAR2(1024),
  qszt   NVARCHAR2(2)
)
;
comment on table ZXDJ
  is 'ע���Ǽ�';
comment on column ZXDJ.zxywh
  is 'ע��ҵ���';
comment on column ZXDJ.ysdm
  is 'Ҫ�ش���';
comment on column ZXDJ.bdcdyh
  is '��������Ԫ��';
comment on column ZXDJ.bdcqz
  is '������Ȩ֤��';
comment on column ZXDJ.ywh
  is 'ԭ֤ҵ���';
comment on column ZXDJ.qxdm
  is '���ش���';
comment on column ZXDJ.djjg
  is '�Ǽǻ���';
comment on column ZXDJ.dbr
  is '�ǲ���';
comment on column ZXDJ.djsj
  is '�Ǽ�ʱ��';
comment on column ZXDJ.qlqtzk
  is 'Ȩ������״��';
comment on column ZXDJ.djyy
  is '�Ǽ�ԭ��';
comment on column ZXDJ.fj
  is '����';
comment on column ZXDJ.qszt
  is 'Ȩ��״̬';


spool off
