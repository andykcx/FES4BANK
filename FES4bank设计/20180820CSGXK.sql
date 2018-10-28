------------------------------------------------------
-- Export file for user CSGXK@10.43.127.12/LZBDCSVR --
-- Created by dell on 2018/8/20, 16:06:42 ------------
------------------------------------------------------

set define off
spool 20180820共享库1.log

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
  is '业务办理过程';
comment on column BLGC.ywgcbh
  is '业务过程编号';
comment on column BLGC.ywmc
  is '业务名称';
comment on column BLGC.cxmm
  is '查询密码';
comment on column BLGC.sjsj
  is '收件时间';
comment on column BLGC.cnsj
  is '承诺时间';
comment on column BLGC.sqr
  is '申请人';
comment on column BLGC.gczt
  is '过程状态';
comment on column BLGC.wcsj
  is '完成时间';

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
  is '业务办理活动';
comment on column BLHD.ywhdbh
  is '业务活动编号';
comment on column BLHD.ywgcbh
  is '业务过程编号';
comment on column BLHD.bzmc
  is '步骤名称';
comment on column BLHD.sxh
  is '顺序号';
comment on column BLHD.slr
  is '受理人';
comment on column BLHD.slsj
  is '受理时间';
comment on column BLHD.hdzt
  is '活动状态';
comment on column BLHD.wcsj
  is '完成时间';

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
  is '层';
comment on column C.ch
  is '层号';
comment on column C.zrzh
  is '自然幢号';
comment on column C.ysdm
  is '要素代码';
comment on column C.ljzh
  is '逻辑幢号';
comment on column C.sjc
  is '实际层';
comment on column C.myc
  is '名义层';
comment on column C.cjzmj
  is '层建筑面积';
comment on column C.ctnjzmj
  is '层套内建筑面积';
comment on column C.cytmj
  is '层阳台面积';
comment on column C.cgyjzmj
  is '层共有建筑面积';
comment on column C.cftjzmj
  is '层分摊建筑面积';
comment on column C.cbqmj
  is '层半墙面积';
comment on column C.cg
  is '层高';
comment on column C.sptymj
  is '水平投影面积';
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
  is '查封登记';
comment on column CFDJ.ywh
  is '业务号';
comment on column CFDJ.ysdm
  is '要素代码';
comment on column CFDJ.bdcdyh
  is '不动产单元号';
comment on column CFDJ.cfjg
  is '查封机关';
comment on column CFDJ.cflx
  is '查封类型';
comment on column CFDJ.cfwj
  is '查封文件';
comment on column CFDJ.cfwh
  is '查封文号';
comment on column CFDJ.cfqx
  is '查封期限';
comment on column CFDJ.cfqssj
  is '查封起始时间';
comment on column CFDJ.cfjssj
  is '查封结束时间';
comment on column CFDJ.cffw
  is '查封范围';
comment on column CFDJ.qxdm
  is '区县代码';
comment on column CFDJ.djjg
  is '登记机构';
comment on column CFDJ.dbr
  is '登簿人';
comment on column CFDJ.djsj
  is '登记时间';
comment on column CFDJ.jfywh
  is '解封业务号';
comment on column CFDJ.jfjg
  is '解封机关';
comment on column CFDJ.jfwj
  is '解封文件';
comment on column CFDJ.jfwh
  is '解封文号';
comment on column CFDJ.jfdbr
  is '解封登簿人';
comment on column CFDJ.jfdjsj
  is '解封登记时间';
comment on column CFDJ.qlqtzk
  is '权利其他状况';
comment on column CFDJ.fj
  is '附记';
comment on column CFDJ.qszt
  is '权属状态';

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
  is '登记图属关联';
comment on column DJTSGL.glbm
  is '关联编码';
comment on column DJTSGL.ywh
  is '业务号';
comment on column DJTSGL.bdclx
  is '不动产类型';
comment on column DJTSGL.bdcid
  is '不动产ID';
comment on column DJTSGL.bdcdyh
  is '不动产单元号';
comment on column DJTSGL.djzl
  is '登记种类';
comment on column DJTSGL.cssj
  is '产生时间';
comment on column DJTSGL.qszt
  is '权属状态';
comment on column DJTSGL.xsqsrq
  is '限售起始日期';
comment on column DJTSGL.xsjzrq
  is '限售截止日期';
comment on column DJTSGL.fdgjlx
  is '房地挂接类型';

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
  is '抵押权';
comment on column DYAQ.ywh
  is '业务号';
comment on column DYAQ.ysdm
  is '要素代码';
comment on column DYAQ.bdcdyh
  is '不动产单元号';
comment on column DYAQ.dybdclx
  is '不动产类型';
comment on column DYAQ.dyr
  is '抵押人';
comment on column DYAQ.dyfs
  is '抵押方式';
comment on column DYAQ.djlx
  is '登记类型';
comment on column DYAQ.djyy
  is '登记原因';
comment on column DYAQ.zjjzwzl
  is '在建建筑物坐落';
comment on column DYAQ.zjjzwdyfw
  is '在建建筑物抵押范围';
comment on column DYAQ.bdbzzqse
  is '被担保主债权数额';
comment on column DYAQ.zwlxqx
  is '债务履行期限';
comment on column DYAQ.zwlxqssj
  is '债务履行起始时间';
comment on column DYAQ.zwlxjssj
  is '债务履行结束时间';
comment on column DYAQ.zgzqqdss
  is '最高债权确定事实';
comment on column DYAQ.zgzqse
  is '最高债权数额';
comment on column DYAQ.zxdyywh
  is '注销抵押业务号';
comment on column DYAQ.zxdyyy
  is '注销抵押原因';
comment on column DYAQ.zxsj
  is '注销时间';
comment on column DYAQ.bdcdjzmh
  is '不动产登记证明号';
comment on column DYAQ.qxdm
  is '区县代码';
comment on column DYAQ.djjg
  is '登记机构';
comment on column DYAQ.dbr
  is '登簿人';
comment on column DYAQ.djsj
  is '登记时间';
comment on column DYAQ.qlqtzk
  is '权利其他状况';
comment on column DYAQ.fj
  is '附记';
comment on column DYAQ.qszt
  is '权属状态';
comment on column DYAQ.dylx
  is '抵押类型';

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
  is '地役权';
comment on column DYIQ.ywh
  is '业务号';
comment on column DYIQ.ysdm
  is '要素代码';
comment on column DYIQ.gydbdcdyh
  is '供役地不动产单元号';
comment on column DYIQ.gydqlr
  is '供役地权利人';
comment on column DYIQ.gydqlrzjzl
  is '供役地权利人证件种类';
comment on column DYIQ.gydqlrzjh
  is '供役地权利人证件号';
comment on column DYIQ.xydbdcdyh
  is '需役地不动产单元号';
comment on column DYIQ.xydzl
  is '需役地坐落';
comment on column DYIQ.xydqlr
  is '需役地权利人';
comment on column DYIQ.xydqlrzjzl
  is '需役地权利人证件种类';
comment on column DYIQ.xydqlrzjh
  is '需役地权利人证件号';
comment on column DYIQ.djlx
  is '登记类型';
comment on column DYIQ.djyy
  is '登记原因';
comment on column DYIQ.dyqnr
  is '地役权内容';
comment on column DYIQ.bdcdjzmh
  is '不动产登记证明号';
comment on column DYIQ.qlqx
  is '权利期限';
comment on column DYIQ.qlqssj
  is '权利起始时间';
comment on column DYIQ.qljssj
  is '权利结束时间';
comment on column DYIQ.qxdm
  is '区县代码';
comment on column DYIQ.djjg
  is '登记机构';
comment on column DYIQ.dbr
  is '登簿人';
comment on column DYIQ.djsj
  is '登记时间';
comment on column DYIQ.qlqtzk
  is '权利其他状况';
comment on column DYIQ.fj
  is '附记';
comment on column DYIQ.qszt
  is '权属状态';
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
  is '开发项目表';
comment on column FDCKFXM.xmbh
  is '项目编号';
comment on column FDCKFXM.xmmc
  is '项目名称';
comment on column FDCKFXM.xsmc
  is '销售名称';
comment on column FDCKFXM.qxh
  is '区县号';
comment on column FDCKFXM.xmdz
  is '项目地址';
comment on column FDCKFXM.fdckfqymc
  is '房地产开发企业名称';
comment on column FDCKFXM.fdckfqybh
  is '房地产开发企业编号';
comment on column FDCKFXM.kprq
  is '开盘日期';
comment on column FDCKFXM.rzrq
  is '入住日期';
comment on column FDCKFXM.sldh
  is '售楼电话';
comment on column FDCKFXM.sldz
  is '售楼地址';
comment on column FDCKFXM.tdsyqzh
  is '土地使用权证号';
comment on column FDCKFXM.tddj
  is '土地等级';
comment on column FDCKFXM.ghyt
  is '规划用途';
comment on column FDCKFXM.zts
  is '总套数';
comment on column FDCKFXM.zjzmj
  is '总建筑面积';
comment on column FDCKFXM.szfw
  is '四至范围';
comment on column FDCKFXM.zdmj
  is '占地面积';
comment on column FDCKFXM.zrzs
  is '自然幢数';
comment on column FDCKFXM.dqksts
  is '当前可售套数';
comment on column FDCKFXM.dqksmj
  is '当前可售面积';
comment on column FDCKFXM.yydts
  is '已预订套数';
comment on column FDCKFXM.ysts
  is '已售套数';
comment on column FDCKFXM.lpjj
  is '楼盘简介';
comment on column FDCKFXM.sbzx
  is '设备装修';
comment on column FDCKFXM.sgjd
  is '施工进度';
comment on column FDCKFXM.ptss
  is '配套设施';
comment on column FDCKFXM.zwjt
  is '周围交通';
comment on column FDCKFXM.lhl
  is '绿化率';
comment on column FDCKFXM.rjl
  is '容积率';
comment on column FDCKFXM.jzmd
  is '建筑密度';
comment on column FDCKFXM.cwgs
  is '车位个数';
comment on column FDCKFXM.jsydghxkzh
  is '建设用地规划许可证号';
comment on column FDCKFXM.bkbh
  is '板块编号';
comment on column FDCKFXM.tdtz
  is '土地投资';
comment on column FDCKFXM.jhzjzmj
  is '计划总建筑面积';
comment on column FDCKFXM.jhztz
  is '计划总投资';
comment on column FDCKFXM.jhkgsj
  is '计划开工时间';
comment on column FDCKFXM.jhjgsj
  is '计划竣工时间';
comment on column FDCKFXM.sjwctz
  is '实际完成投资';
comment on column FDCKFXM.sjkgsj
  is '实际开工时间';
comment on column FDCKFXM.sjjgsj
  is '实际竣工时间';
comment on column FDCKFXM.bz
  is '备注';
comment on column FDCKFXM.sjcrsj
  is '数据插入时间
数据插入时间
数据插入时间
数据插入时间';
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
  is '房地产权多幢';
comment on column FDCQ1.ywh
  is '业务号';
comment on column FDCQ1.ysdm
  is '要素代码';
comment on column FDCQ1.bdcdyh
  is '不动产单元号';
comment on column FDCQ1.qllx
  is '权利类型';
comment on column FDCQ1.djlx
  is '登记类型';
comment on column FDCQ1.djyy
  is '登记原因';
comment on column FDCQ1.fdzl
  is '房地坐落';
comment on column FDCQ1.tdsyqr
  is '土地使用权人';
comment on column FDCQ1.dytdmj
  is '独用土地面积';
comment on column FDCQ1.fttdmj
  is '分摊土地面积';
comment on column FDCQ1.tdsyqx
  is '土地使用期限';
comment on column FDCQ1.tdsyqssj
  is '土地使用起始时间';
comment on column FDCQ1.tdsyjssj
  is '土地使用结束时间';
comment on column FDCQ1.fdcjyjg
  is '房地产交易价格';
comment on column FDCQ1.bdcqzh
  is '不动产权证号';
comment on column FDCQ1.qxdm
  is '区县代码';
comment on column FDCQ1.djjg
  is '登记机构';
comment on column FDCQ1.dbr
  is '登簿人';
comment on column FDCQ1.djsj
  is '登记时间';
comment on column FDCQ1.qlqtzk
  is '权利其他状况';
comment on column FDCQ1.fj
  is '附记';
comment on column FDCQ1.fcfht
  is '房产分户图';
comment on column FDCQ1.qszt
  is '权属状态';
comment on column FDCQ1.gytdmj
  is '共有土地面积';

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
  is '房地产权独幢';
comment on column FDCQ2.ywh
  is '业务号';
comment on column FDCQ2.ysdm
  is '要素代码';
comment on column FDCQ2.bdcdyh
  is '不动产单元号';
comment on column FDCQ2.qllx
  is '权利类型';
comment on column FDCQ2.djlx
  is '登记类型';
comment on column FDCQ2.djyy
  is '登记原因';
comment on column FDCQ2.fdzl
  is '房地坐落';
comment on column FDCQ2.tdsyqr
  is '土地使用权人';
comment on column FDCQ2.dytdmj
  is '独用土地面积';
comment on column FDCQ2.fttdmj
  is '分摊土地面积';
comment on column FDCQ2.tdsyqx
  is '土地使用期限';
comment on column FDCQ2.tdsyqssj
  is '土地使用起始时间';
comment on column FDCQ2.tdsyjssj
  is '土地使用结束时间';
comment on column FDCQ2.fdcjyjg
  is '房地产交易价格';
comment on column FDCQ2.ghyt
  is '规划用途';
comment on column FDCQ2.fwxz
  is '房屋性质';
comment on column FDCQ2.fwjg
  is '房屋结构';
comment on column FDCQ2.szc
  is '所在层';
comment on column FDCQ2.zcs
  is '总层数';
comment on column FDCQ2.jzmj
  is '建筑面积';
comment on column FDCQ2.zyjzmj
  is '专有建筑面积';
comment on column FDCQ2.ftjzmj
  is '分摊建筑面积';
comment on column FDCQ2.jgsj
  is '竣工时间';
comment on column FDCQ2.bdcqzh
  is '不动产权证号';
comment on column FDCQ2.qxdm
  is '区县代码';
comment on column FDCQ2.djjg
  is '登记机构';
comment on column FDCQ2.dbr
  is '登簿人';
comment on column FDCQ2.djsj
  is '登记时间';
comment on column FDCQ2.qlqtzk
  is '权利其他状况';
comment on column FDCQ2.fj
  is '附记';
comment on column FDCQ2.qszt
  is '权属状态';
comment on column FDCQ2.gytdmj
  is '共有土地面积';
comment on column FDCQ2.ytmc
  is '用途名称';
comment on column FDCQ2.fwxzmc
  is '房屋性质名称';

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
  is '房地产权建筑物';
comment on column FDCQ3.ywh
  is '业务号';
comment on column FDCQ3.ysdm
  is '要素代码';
comment on column FDCQ3.bdcdyh
  is '不动产单元号';
comment on column FDCQ3.qllx
  is '权利类型';
comment on column FDCQ3.jgzwbh
  is '建（构）筑物编号';
comment on column FDCQ3.jgzwmc
  is '建（构）筑物名称';
comment on column FDCQ3.jgzwsl
  is '建（构）筑物数量';
comment on column FDCQ3.jgzwmj
  is '建（构）筑物面积';
comment on column FDCQ3.fttdmj
  is '分摊土地面积';
comment on column FDCQ3.qxdm
  is '区县代码';
comment on column FDCQ3.djjg
  is '登记机构';
comment on column FDCQ3.dbr
  is '登簿人';
comment on column FDCQ3.djsj
  is '登记时间';
comment on column FDCQ3.qlqtzk
  is '权利其他状况';
comment on column FDCQ3.fj
  is '附记';
comment on column FDCQ3.qszt
  is '权属状态';
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
  is '房地项目内多幢房屋';
comment on column FDCQXM.ywh
  is '业务号';
comment on column FDCQXM.bdcdyh
  is '不动产单元号';
comment on column FDCQXM.xmmc
  is '项目名称';
comment on column FDCQXM.zh
  is '幢号';
comment on column FDCQXM.zcs
  is '总层数';
comment on column FDCQXM.ghyt
  is '规划用途';
comment on column FDCQXM.fwjg
  is '房屋结构';
comment on column FDCQXM.jzmj
  is '建筑面积';
comment on column FDCQXM.jgsj
  is '竣工时间';
comment on column FDCQXM.zts
  is '总套数';
comment on column FDCQXM.ytmc
  is '用途名称';

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
  is '项目关联表';
comment on column FDCXMGL.glbh
  is '关联编号';
comment on column FDCXMGL.xmmc
  is '项目名称';
comment on column FDCXMGL.xmbh
  is '项目编号';
comment on column FDCXMGL.cyryid
  is '从业人员ID';
comment on column FDCXMGL.glrq
  is '关联日期';
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
  is '发证';
comment on column FZ.ywh
  is '业务号';
comment on column FZ.ysdm
  is '要素代码';
comment on column FZ.fzry
  is '发证人员';
comment on column FZ.fzsj
  is '发证时间';
comment on column FZ.fzmc
  is '发证名称';
comment on column FZ.fzsl
  is '发证数量';
comment on column FZ.hfzsh
  is '核发证书号';
comment on column FZ.lzrxm
  is '领证人姓名';
comment on column FZ.lzrzjlb
  is '领证人证件类别';
comment on column FZ.lzrzjh
  is '领证人证件号';
comment on column FZ.lzrdh
  is '领证人电话';
comment on column FZ.lzrdz
  is '领证人地址';
comment on column FZ.lzryb
  is '领证人邮编';
comment on column FZ.bz
  is '备注';

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
  is '归档';
comment on column GD.ywh
  is '业务号';
comment on column GD.ysdm
  is '要素代码';
comment on column GD.dah
  is '档案号';
comment on column GD.djdl
  is '登记大类';
comment on column GD.djxl
  is '登记小类';
comment on column GD.zl
  is '坐落';
comment on column GD.qzhm
  is '权证号码';
comment on column GD.wjjs
  is '文件件数';
comment on column GD.zys
  is '总页数';
comment on column GD.gdry
  is '归档人员';
comment on column GD.gdsj
  is '归档时间';
comment on column GD.bz
  is '备注';
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
  is '构建筑物所有权';
comment on column GJZWSYQ.ywh
  is '业务号';
comment on column GJZWSYQ.ysdm
  is '要素代码';
comment on column GJZWSYQ.bdcdyh
  is '不动产单元号';
comment on column GJZWSYQ.qllx
  is '权利类型';
comment on column GJZWSYQ.djlx
  is '登记类型';
comment on column GJZWSYQ.djyy
  is '登记原因';
comment on column GJZWSYQ.zl
  is '坐落';
comment on column GJZWSYQ.tdhysyqr
  is '土地/海域使用权人';
comment on column GJZWSYQ.tdhysymj
  is '土地/海域使用面积';
comment on column GJZWSYQ.tdhysyqx
  is '土地/海域使用期限';
comment on column GJZWSYQ.tdhysyqssj
  is '土地/海域使用起始时间';
comment on column GJZWSYQ.tdhysyjssj
  is '土地/海域使用结束时间';
comment on column GJZWSYQ.gjzwlx
  is '构（建）筑物类型';
comment on column GJZWSYQ.gjzwghyt
  is '构（建）筑物规划用途';
comment on column GJZWSYQ.gjzwmj
  is '构(建)筑物面积';
comment on column GJZWSYQ.jgsj
  is '竣工时间';
comment on column GJZWSYQ.bdcqzh
  is '不动产权证号';
comment on column GJZWSYQ.qxdm
  is '区县代码';
comment on column GJZWSYQ.djjg
  is '登记机构';
comment on column GJZWSYQ.dbr
  is '登簿人';
comment on column GJZWSYQ.djsj
  is '登记时间';
comment on column GJZWSYQ.qlqtzk
  is '权利其他状况';
comment on column GJZWSYQ.fj
  is '附记';
comment on column GJZWSYQ.gjzwpmt
  is '构（建）筑物平面图';
comment on column GJZWSYQ.qszt
  is '权属状态';
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
  is '共享信息';
comment on column GXXX.bh
  is '信息编号';
comment on column GXXX.bt
  is '信息标题';
comment on column GXXX.nr
  is '信息内容';
comment on column GXXX.lb
  is '信息类别';
comment on column GXXX.tjsj
  is '添加时间';
comment on column GXXX.xh
  is '序号';
comment on column GXXX.zt
  is '状态';
comment on column GXXX.yxsj
  is '有效时间';
comment on column GXXX.htmlnr
  is '带HTML标签的内容';
comment on column GXXX.ys
  is '样式，是文本还是URl链接地址';
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
  is '共享信息附表';
comment on column GXXXFB.zbh
  is '附表编号';
comment on column GXXXFB.bh
  is '主表编号';
comment on column GXXXFB.lb
  is '类别';
comment on column GXXXFB.nr
  is '内容';
comment on column GXXXFB.sm
  is '说明';
comment on column GXXXFB.xh
  is '序号';
comment on column GXXXFB.zt
  is '状态';
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
  is '户';
comment on column H.hid
  is '户ID';
comment on column H.zid
  is '幢编号';
comment on column H.bdcdyh
  is '不动产单元号';
comment on column H.fwbm
  is '房屋编码';
comment on column H.ysdm
  is '要素代码';
comment on column H.zrzh
  is '自然幢号';
comment on column H.ljzh
  is '逻辑幢号';
comment on column H.ch
  is '层号';
comment on column H.zl
  is '坐落';
comment on column H.mjdw
  is '面积单位';
comment on column H.dyh
  is '单元号';
comment on column H.fjh
  is '房间号';
comment on column H.mych
  is '名义层号';
comment on column H.sjcs
  is '实际层数';
comment on column H.hh
  is '户号';
comment on column H.shbw
  is '室号部位';
comment on column H.hx
  is '户型';
comment on column H.hxjg
  is '户型结构';
comment on column H.fwyt1
  is '房屋用途1';
comment on column H.fwyt2
  is '房屋用途2';
comment on column H.fwyt3
  is '房屋用途3';
comment on column H.ycjzmj
  is '预测建筑面积';
comment on column H.yctnjzmj
  is '预测套内建筑面积';
comment on column H.ycftjzmj
  is '预测分摊建筑面积';
comment on column H.ycdxbfjzmj
  is '预测地下部分建筑面积';
comment on column H.ycqtjzmj
  is '预测其它建筑面积';
comment on column H.ycftxs
  is '预测分摊系数';
comment on column H.scjzmj
  is '实测建筑面积';
comment on column H.sctnjzmj
  is '实测套内建筑面积';
comment on column H.scftjzmj
  is '实测分摊建筑面积';
comment on column H.scdxbfjzmj
  is '实测地下部分建筑面积';
comment on column H.scqtjzmj
  is '实测其它建筑面积';
comment on column H.scftxs
  is '实测分摊系数';
comment on column H.gytdmj
  is '共有土地面积';
comment on column H.fttdmj
  is '分摊土地面积';
comment on column H.dytdmj
  is '独用土地面积';
comment on column H.fwlx
  is '房屋类型';
comment on column H.fwxz
  is '房屋性质';
comment on column H.fcfht
  is '房产分户图';
comment on column H.zt
  is '状态';
comment on column H.isrghs
  is '是否人工核实';
comment on column H.rghsry
  is '人工核实人员';
comment on column H.rghsrq
  is '人工核实日期';
comment on column H.yhbh
  is '原户编号';
comment on column H.hlx
  is '户类型';
comment on column H.fjzb
  is '房间坐标';
comment on column H.hzt
  is '户状态是否可登记';
comment on column H.zbtop
  is '上坐标';
comment on column H.zbleft
  is '左坐标';
comment on column H.zbbottom
  is '下坐标';
comment on column H.zbright
  is '右坐标';
comment on column H.sjclh
  is '实际层列号';
comment on column H.dcsj
  is '调查时间';
comment on column H.hdj
  is '户单价';
comment on column H.zddm
  is '宗地代码';
comment on column H.ytmc
  is '用途名称';
comment on column H.fwlxmc
  is '房屋类型名称';
comment on column H.fwxzmc
  is '房屋性质名称';
comment on column H.bgjzxx
  is '变更禁止信息';
comment on column H.bgtsxx
  is '变更提示信息';
comment on column H.gzwlx
  is '构筑物类型';

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
  is '合同表';
comment on column HT.ywh
  is '受理编号';
comment on column HT.htbh
  is '合同编号';
comment on column HT.htlx
  is '合同类型';
comment on column HT.djje
  is '定金金额';
comment on column HT.htqdrq
  is '合同签订日期';
comment on column HT.htqrrq
  is '合同确认日期';
comment on column HT.htqrr
  is '合同确认人';
comment on column HT.cqzh
  is '产权证号';
comment on column HT.fwyt
  is '房屋用途';
comment on column HT.jzmj
  is '建筑面积';
comment on column HT.tnjzmj
  is '套内建筑面积';
comment on column HT.ftjzmj
  is '分摊建筑面积';
comment on column HT.htje
  is '合同金额';
comment on column HT.dj
  is '单价';
comment on column HT.gyqk
  is '共有情况';
comment on column HT.gyfs
  is '共有方式';
comment on column HT.bdcfeyd
  is '不动产份额约定';
comment on column HT.jbr
  is '经办人';
comment on column HT.cxrq
  is '合同撤销日期';
comment on column HT.cxr
  is '合同撤销确认人';
comment on column HT.bdcsyqr
  is '不动产所有权人';
comment on column HT.fklx
  is '付款类型';
comment on column HT.dkfs
  is '贷款方式';
comment on column HT.fksj
  is '付款时间';
comment on column HT.zt
  is '状态(0:办理中，1:审核中，2:已备案)';
comment on column HT.sfyx
  is '是否有效';
comment on column HT.qszt
  is '现实\历史状态';
comment on column HT.yhbs
  is '用户标识';
comment on column HT.djlx
  is '登记类型';
comment on column HT.dqbz
  is '当前步骤';
comment on column HT.dqbljs
  is '当前办理角色';
comment on column HT.tdzl
  is '土地坐落';
comment on column HT.zdtybm
  is '宗地统一编码';
comment on column HT.tdxgzh
  is '土地相关证号';
comment on column HT.htmb
  is '合同模版';
comment on column HT.fkzzrq
  is '付款截止日期';
comment on column HT.sfqefq
  is '是否全额付清（是/否）';
comment on column HT.yszjzh
  is '商品房预售资金专用账号';
comment on column HT.jgyh
  is '监管银行';
comment on column HT.sqsj
  is '申请时间';
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
  is '海域海岛使用权';
comment on column HYSYQ.ywh
  is '业务号';
comment on column HYSYQ.ysdm
  is '要素代码';
comment on column HYSYQ.zhhddm
  is '宗海/海岛代码';
comment on column HYSYQ.bdcdyh
  is '不动产单元号';
comment on column HYSYQ.qllx
  is '权利类型';
comment on column HYSYQ.djlx
  is '登记类型';
comment on column HYSYQ.djyy
  is '登记原因';
comment on column HYSYQ.syqmj
  is '使用权面积';
comment on column HYSYQ.syqx
  is '使用期限';
comment on column HYSYQ.syqqssj
  is '使用权起始时间';
comment on column HYSYQ.syqjssj
  is '使用权结束时间';
comment on column HYSYQ.syjze
  is '使用金总额';
comment on column HYSYQ.syjbzyj
  is '使用金标准依据';
comment on column HYSYQ.syjjnqk
  is '使用金缴纳情况';
comment on column HYSYQ.bdcqzh
  is '不动产权证号';
comment on column HYSYQ.qxdm
  is '区县代码';
comment on column HYSYQ.djjg
  is '登记机构';
comment on column HYSYQ.dbr
  is '登簿人';
comment on column HYSYQ.djsj
  is '登记时间';
comment on column HYSYQ.qlqtzk
  is '权利其他状况';
comment on column HYSYQ.fj
  is '附记';
comment on column HYSYQ.qszt
  is '权属状态';
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
  is '建设用地使用权';
comment on column JSYDSYQ.ywh
  is '业务号';
comment on column JSYDSYQ.ysdm
  is '要素代码';
comment on column JSYDSYQ.zddm
  is '宗地代码';
comment on column JSYDSYQ.bdcdyh
  is '不动产单元号';
comment on column JSYDSYQ.qllx
  is '权利类型';
comment on column JSYDSYQ.djlx
  is '登记类型';
comment on column JSYDSYQ.djyy
  is '登记原因';
comment on column JSYDSYQ.syqmj
  is '使用权面积';
comment on column JSYDSYQ.syqx
  is '使用期限';
comment on column JSYDSYQ.syqqssj
  is '使用权起始时间';
comment on column JSYDSYQ.syqjssj
  is '使用权结束时间';
comment on column JSYDSYQ.qdjg
  is '取得价格';
comment on column JSYDSYQ.bdcqzh
  is '不动产权证号';
comment on column JSYDSYQ.qxdm
  is '区县代码';
comment on column JSYDSYQ.djjg
  is '登记机构';
comment on column JSYDSYQ.dbr
  is '登簿人';
comment on column JSYDSYQ.djsj
  is '登记时间';
comment on column JSYDSYQ.qlqtzk
  is '权利其他状况';
comment on column JSYDSYQ.fj
  is '附记';
comment on column JSYDSYQ.qszt
  is '权属状态';
comment on column JSYDSYQ.zslx
  is '证书类型';

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
  is '开盘管理';
comment on column KPGL.slbh
  is '受理编号';
comment on column KPGL.xkbh
  is '许可编号';
comment on column KPGL.xkzh
  is '许可证号';
comment on column KPGL.xmmc
  is '项目名称';
comment on column KPGL.kfdw
  is '开发单位';
comment on column KPGL.fgwwjm
  is '发改委文件名';
comment on column KPGL.fgwph
  is '发改委批号';
comment on column KPGL.pzrq
  is '批准日期';
comment on column KPGL.zjzmj
  is '总建筑面积';
comment on column KPGL.zzjzmj
  is '住宅建筑面积';
comment on column KPGL.fzzjzmj
  is '非住宅建筑面积';
comment on column KPGL.szqy
  is '所在区域';
comment on column KPGL.rjl
  is '容积率';
comment on column KPGL.lxyxq
  is '立项有效期';
comment on column KPGL.zzdmj
  is '总占地面积';
comment on column KPGL.dszdmj
  is '地上占地面积';
comment on column KPGL.dxzdmj
  is '地下占地面积';
comment on column KPGL.zzzdmj
  is '住宅占地面积';
comment on column KPGL.spzdmj
  is '商铺占地面积';
comment on column KPGL.fszdmj
  is '附属占地面积';
comment on column KPGL.ghzts
  is '规划总套数';
comment on column KPGL.ldl
  is '绿地率';
comment on column KPGL.jzmd
  is '建筑密度';
comment on column KPGL.xmjsksrq
  is '项目建设开始日期';
comment on column KPGL.yjxmwgrq
  is '预计项目完工日期';
comment on column KPGL.gcztz
  is '工程总投资';
comment on column KPGL.tdzh
  is '土地使用证';
comment on column KPGL.jsydxkzh
  is '建设用地规划许可证';
comment on column KPGL.jsgcsjfahdtzs
  is '建设工程设计方案核定通知书';
comment on column KPGL.xmdz
  is '项目地址';
comment on column KPGL.bzfpjb
  is '保障房配建比';
comment on column KPGL.slcdz
  is '售楼处地址';
comment on column KPGL.sldh
  is '售楼电话';
comment on column KPGL.sjdw
  is '设计单位';
comment on column KPGL.sgdw
  is '施工单位';
comment on column KPGL.jldw
  is '监理单位';
comment on column KPGL.xmjj
  is '项目简介';
comment on column KPGL.xmjd
  is '项目进度';
comment on column KPGL.xmpt
  is '项目配套';
comment on column KPGL.zbpt
  is '周边配套';
comment on column KPGL.zt
  is '状态(0:办理中，1:审核中，2:通过，3:未通过)';
comment on column KPGL.sqsj
  is '申请时间';
comment on column KPGL.jbr
  is '经办人';
comment on column KPGL.sjcrsj
  is '数据插入时间';
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
  is '逻辑幢';
comment on column LJZ.zid
  is '幢编号';
comment on column LJZ.ljzh
  is '逻辑幢号';
comment on column LJZ.zrzh
  is '自然幢号';
comment on column LJZ.ysdm
  is '要素代码';
comment on column LJZ.mph
  is '门牌号';
comment on column LJZ.ycjzmj
  is '预测建筑面积';
comment on column LJZ.ycdxmj
  is '预测地下面积';
comment on column LJZ.ycqtmj
  is '预测其它面积';
comment on column LJZ.scjzmj
  is '实测建筑面积';
comment on column LJZ.scdxmj
  is '实测地下面积';
comment on column LJZ.scqtmj
  is '实测其它面积';
comment on column LJZ.jgrq
  is '竣工日期';
comment on column LJZ.fwjg1
  is '房屋结构1';
comment on column LJZ.fwjg2
  is '房屋结构2';
comment on column LJZ.fwjg3
  is '房屋结构3';
comment on column LJZ.jzwzt
  is '建筑物状态';
comment on column LJZ.fwyt1
  is '房屋用途1';
comment on column LJZ.fwyt2
  is '房屋用途2';
comment on column LJZ.fwyt3
  is '房屋用途3';
comment on column LJZ.zcs
  is '总层数';
comment on column LJZ.dscs
  is '地上层数';
comment on column LJZ.dxcs
  is '地下层数';
comment on column LJZ.bz
  is '备注';
comment on column LJZ.zddm
  is '宗地代码';
comment on column LJZ.isrghs
  is '是否人工核实';
comment on column LJZ.rghsry
  is '人工核实人员';
comment on column LJZ.rghsrq
  is '人工核实日期';
comment on column LJZ.dcsj
  is '调查时间';
comment on column LJZ.ytmc
  is '用途名称';
comment on column LJZ.xmbh
  is '项目编号';
comment on column LJZ.xmmc
  is '项目名称';
comment on column LJZ.zl
  is '坐落';
comment on column LJZ.bgjzxx
  is '变更禁止信息';
comment on column LJZ.bgtsxx
  is '变更提示信息';
comment on column LJZ.jcnf
  is '建成年份';

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
  is '林权';
comment on column LQ.ywh
  is '业务号';
comment on column LQ.ysdm
  is '要素代码';
comment on column LQ.bdcdyh
  is '不动产单元号';
comment on column LQ.qllx
  is '权利类型';
comment on column LQ.djlx
  is '登记类型';
comment on column LQ.djyy
  is '登记原因';
comment on column LQ.fbf
  is '发包方';
comment on column LQ.syqmj
  is '使用权（承包）面积';
comment on column LQ.ldsyqx
  is '林地使用（承包）期限';
comment on column LQ.ldsyqssj
  is '林地使用（承包）起始时间';
comment on column LQ.ldsyjssj
  is '林地使用（承包）结束时间';
comment on column LQ.ldsyqxz
  is '林地所有权性质';
comment on column LQ.sllmsyqr1
  is '森林、林木所有权人';
comment on column LQ.sllmsyqr2
  is '森林、林木使用权人';
comment on column LQ.zysz
  is '主要树种';
comment on column LQ.zs
  is '株数';
comment on column LQ.lz
  is '林种';
comment on column LQ.qy
  is '起源';
comment on column LQ.zlnd
  is '造林年度';
comment on column LQ.lb
  is '林班';
comment on column LQ.xb
  is '小班';
comment on column LQ.xdm
  is '小地名';
comment on column LQ.bdcqzh
  is '不动产权证号';
comment on column LQ.qxdm
  is '区县代码';
comment on column LQ.djjg
  is '登记机构';
comment on column LQ.dbr
  is '登簿人';
comment on column LQ.djsj
  is '登记时间';
comment on column LQ.qlqtzk
  is '权利其他状况';
comment on column LQ.fj
  is '附记';
comment on column LQ.qszt
  is '权属状态';
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
  is '农用地使用权';
comment on column NYDSYQ.ywh
  is '业务号';
comment on column NYDSYQ.ysdm
  is '要素代码';
comment on column NYDSYQ.bdcdyh
  is '不动产单元号';
comment on column NYDSYQ.qllx
  is '权利类型';
comment on column NYDSYQ.djlx
  is '登记类型';
comment on column NYDSYQ.djyy
  is '登记原因';
comment on column NYDSYQ.zl
  is '坐落';
comment on column NYDSYQ.fbfdm
  is '发包方代码';
comment on column NYDSYQ.fbfmc
  is '发包方名称';
comment on column NYDSYQ.cbmj
  is '承包（使用权）面积';
comment on column NYDSYQ.cbsyqx
  is '承包(使用)期限';
comment on column NYDSYQ.cbqssj
  is '承包(使用)起始时间';
comment on column NYDSYQ.cbjssj
  is '承包(使用)结束时间';
comment on column NYDSYQ.tdsyqxz
  is '土地所有权性质';
comment on column NYDSYQ.syttlx
  is '水域滩涂类型';
comment on column NYDSYQ.yzyfs
  is '养殖业方式';
comment on column NYDSYQ.cyzl
  is '草原质量';
comment on column NYDSYQ.syzcl
  is '适宜载畜量';
comment on column NYDSYQ.bdcqzh
  is '不动产权证号';
comment on column NYDSYQ.qxdm
  is '区县代码';
comment on column NYDSYQ.djjg
  is '登记机构';
comment on column NYDSYQ.dbr
  is '登簿人';
comment on column NYDSYQ.djsj
  is '登记时间';
comment on column NYDSYQ.qlqtzk
  is '权利其他状况';
comment on column NYDSYQ.fj
  is '附记';
comment on column NYDSYQ.qszt
  is '权属状态';
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
  is '要素代码';
comment on column QLR.bdcdyh
  is '不动产单元号';
comment on column QLR.sxh
  is '顺序号';
comment on column QLR.qlrmc
  is '权利人名称';
comment on column QLR.bdcqzh
  is '不动产权证号';
comment on column QLR.qzysxlh
  is '权证印刷序列号';
comment on column QLR.sfczr
  is '是否持证人';
comment on column QLR.qllx
  is '权利类型';
comment on column QLR.qszt
  is '权属状态';
comment on column QLR.zjzl
  is '证件种类';
comment on column QLR.zjh
  is '证件号';
comment on column QLR.fzjg
  is '发证机关';
comment on column QLR.sshy
  is '所属行业';
comment on column QLR.gj
  is '国家/地区';
comment on column QLR.hjszss
  is '户籍所在省市';
comment on column QLR.xb
  is '性别';
comment on column QLR.dh
  is '电话';
comment on column QLR.dz
  is '地址';
comment on column QLR.yb
  is '邮编';
comment on column QLR.gzdw
  is '工作单位';
comment on column QLR.dzyj
  is '电子邮件';
comment on column QLR.qlrlx
  is '权利人类型';
comment on column QLR.qlbl
  is '权利比例';
comment on column QLR.gyfs
  is '共有方式';
comment on column QLR.gyqk
  is '共有情况';
comment on column QLR.bz
  is '备注';
comment on column QLR.sqrlx
  is '申请人类型';
comment on column QLR.qlrid
  is '权利人ID';

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
  is '其它相关权利';
comment on column QTXGQL.ywh
  is '业务号';
comment on column QTXGQL.ysdm
  is '要素代码';
comment on column QTXGQL.bdcdyh
  is '不动产单元号';
comment on column QTXGQL.qllx
  is '权利类型';
comment on column QTXGQL.djlx
  is '登记类型';
comment on column QTXGQL.djyy
  is '登记原因';
comment on column QTXGQL.qlqx
  is '权利期限';
comment on column QTXGQL.qlqssj
  is '权利起始时间';
comment on column QTXGQL.qljssj
  is '权利结束时间';
comment on column QTXGQL.qsfs
  is '取水方式';
comment on column QTXGQL.sylx
  is '水源类型';
comment on column QTXGQL.qsl
  is '取水量';
comment on column QTXGQL.qsyt
  is '取水用途';
comment on column QTXGQL.kcmj
  is '勘查面积';
comment on column QTXGQL.kcfs
  is '开采方式';
comment on column QTXGQL.kckz
  is '开采矿种';
comment on column QTXGQL.scgm
  is '生产规模';
comment on column QTXGQL.bdcqzh
  is '不动产权证号';
comment on column QTXGQL.qxdm
  is '区县代码';
comment on column QTXGQL.djjg
  is '登记机构';
comment on column QTXGQL.dbr
  is '登簿人';
comment on column QTXGQL.djsj
  is '登记时间';
comment on column QTXGQL.qlqtzk
  is '权利其他状况';
comment on column QTXGQL.fj
  is '附记';
comment on column QTXGQL.ft
  is '附图';
comment on column QTXGQL.qszt
  is '权属状态';
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
  is '收费';
comment on column SF.ywh
  is '业务号';
comment on column SF.ysdm
  is '要素代码';
comment on column SF.jfry
  is '计费人员';
comment on column SF.jfrq
  is '计费日期';
comment on column SF.sfkmmc
  is '收费科目名称';
comment on column SF.sfewsf
  is '是否额外收费';
comment on column SF.sfjs
  is '收费基数';
comment on column SF.sflx
  is '收费类型';
comment on column SF.ysje
  is '应收金额';
comment on column SF.zkhysje
  is '折扣后应收金额';
comment on column SF.sfry
  is '收费人员';
comment on column SF.sfrq
  is '收费日期';
comment on column SF.fff
  is '付费方';
comment on column SF.sjffr
  is '实际付费人';
comment on column SF.ssje
  is '实收金额';
comment on column SF.sfdw
  is '收费单位';
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
  is '审核';
comment on column SH.shid
  is '审核ID';
comment on column SH.ywh
  is '业务号';
comment on column SH.ysdm
  is '要素代码';
comment on column SH.jdmc
  is '节点名称';
comment on column SH.sxh
  is '顺序号';
comment on column SH.shryxm
  is '审核人员姓名';
comment on column SH.shkssj
  is '审核开始时间';
comment on column SH.shjssj
  is '审核结束时间';
comment on column SH.shyj
  is '审核意见';
comment on column SH.czjg
  is '操作结果';

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
  is '收件清单';
comment on column SJ.sjid
  is '收件ID';
comment on column SJ.fsjid
  is '上级收件ID';
comment on column SJ.ywgcbh
  is '业务过程编号';
comment on column SJ.ysdm
  is '要素代码';
comment on column SJ.sjsj
  is '收件时间';
comment on column SJ.sjlx
  is '收件类型';
comment on column SJ.sjmc
  is '收件名称';
comment on column SJ.sjsl
  is '收件数量';
comment on column SJ.sfsjsy
  is '是否收缴收验';
comment on column SJ.sfewsj
  is '是否额外收件';
comment on column SJ.sfbcsj
  is '是否补充收件';
comment on column SJ.ys
  is '页数';
comment on column SJ.sjfl
  is '收件分类';
comment on column SJ.sjnr
  is '收件内容';
comment on column SJ.sjdx
  is '收件大小';
comment on column SJ.ftplj
  is 'FPT路径';
comment on column SJ.bz
  is '备注';
comment on column SJ.sjhz
  is '收件后缀';
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
  is '受理申请';
comment on column SLSQ.ywh
  is '业务号';
comment on column SLSQ.ysdm
  is '要素代码';
comment on column SLSQ.ywgcbh
  is '业务过程编号';
comment on column SLSQ.djdl
  is '登记大类';
comment on column SLSQ.djxl
  is '登记小类';
comment on column SLSQ.sqzsbs
  is '申请证书版式';
comment on column SLSQ.sqfbcz
  is '申请分别持证';
comment on column SLSQ.qxdm
  is '区县代码';
comment on column SLSQ.slry
  is '受理人员';
comment on column SLSQ.slsj
  is '受理时间';
comment on column SLSQ.zl
  is '坐落';
comment on column SLSQ.tzrxm
  is '通知人姓名';
comment on column SLSQ.tzfs
  is '通知方式';
comment on column SLSQ.tzrdh
  is '通知人电话';
comment on column SLSQ.tzryddh
  is '通知人移动电话';
comment on column SLSQ.tzrdzyj
  is '通知人电子邮件';
comment on column SLSQ.sfwtaj
  is '是否问题案件';
comment on column SLSQ.jssj
  is '结束时间';
comment on column SLSQ.ajzt
  is '案件状态';
comment on column SLSQ.bz
  is '备注';
comment on column SLSQ.htbh
  is '房产交易合同编号';
comment on column SLSQ.sjcrsj
  is '数据插入时间';
comment on column SLSQ.wwsqbh
  is '外网申请编号';
comment on column SLSQ.wwyybh
  is '外网预约编号';
comment on column SLSQ.fcslh
  is '房产受理号';

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
  is '缮证';
comment on column SZ.ywh
  is '业务号';
comment on column SZ.ysdm
  is '要素代码';
comment on column SZ.szmc
  is '缮证名称';
comment on column SZ.szzh
  is '缮证证号';
comment on column SZ.ysxlh
  is '印刷序列号';
comment on column SZ.szry
  is '缮证人员';
comment on column SZ.szsj
  is '缮证时间';
comment on column SZ.bz
  is '备注';

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
  is '土地所有权';
comment on column TDSYQ.ywh
  is '业务号';
comment on column TDSYQ.ysdm
  is '要素代码';
comment on column TDSYQ.zddm
  is '宗地代码';
comment on column TDSYQ.bdcdyh
  is '不动产单元号';
comment on column TDSYQ.qllx
  is '权利类型';
comment on column TDSYQ.djlx
  is '登记类型';
comment on column TDSYQ.djyy
  is '登记原因';
comment on column TDSYQ.mjdw
  is '面积单位';
comment on column TDSYQ.nydmj
  is '农用地面积';
comment on column TDSYQ.gdmj
  is '耕地面积';
comment on column TDSYQ.ldmj
  is '林地面积';
comment on column TDSYQ.cdmj
  is '草地面积';
comment on column TDSYQ.qtnydmj
  is '其它农用地面积';
comment on column TDSYQ.jsydmj
  is '建设用地面积';
comment on column TDSYQ.wlydmj
  is '未利用地面积';
comment on column TDSYQ.bdcqzh
  is '不动产权证号';
comment on column TDSYQ.qxdm
  is '区县代码';
comment on column TDSYQ.djjg
  is '登记机构';
comment on column TDSYQ.dbr
  is '登簿人';
comment on column TDSYQ.djsj
  is '登记时间';
comment on column TDSYQ.qlqtzk
  is '权利其他状况';
comment on column TDSYQ.fj
  is '附记';
comment on column TDSYQ.qszt
  is '权属状态';
comment on column TDSYQ.zslx
  is '证书类型';

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
  is '查询申请';
comment on column WW_CXSQ.sqbh
  is '申请编号';
comment on column WW_CXSQ.sqrq
  is '申请日期';
comment on column WW_CXSQ.sqr
  is '申请人';
comment on column WW_CXSQ.sqrzjhm
  is '申请人证件号';
comment on column WW_CXSQ.sqrzjlx
  is '申请人证件类型';
comment on column WW_CXSQ.cxyt
  is '查询用途';
comment on column WW_CXSQ.cxsm
  is '查询说明';
comment on column WW_CXSQ.blzt
  is '办理状态';
comment on column WW_CXSQ.blwd
  is '办理网点';
comment on column WW_CXSQ.lqfs
  is '领取方式';
comment on column WW_CXSQ.sjr
  is '收件人';
comment on column WW_CXSQ.sjrdhhm
  is '收件人电话号码';
comment on column WW_CXSQ.sjdz
  is '收件地址';
comment on column WW_CXSQ.yb
  is '邮编';
comment on column WW_CXSQ.spr
  is '审批人';
comment on column WW_CXSQ.sprq
  is '审批日期';
comment on column WW_CXSQ.spyj
  is '审批意见';
comment on column WW_CXSQ.dccs
  is '导出次数';
comment on column WW_CXSQ.spbz
  is '审批备注';
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
  is '外网登记申请';
comment on column WW_DJSQ.sqbh
  is '申请编号';
comment on column WW_DJSQ.sqrq
  is '申请日期';
comment on column WW_DJSQ.djdl
  is '登记大类';
comment on column WW_DJSQ.djxl
  is '登记小类';
comment on column WW_DJSQ.sqzsbs
  is '申请证书板式';
comment on column WW_DJSQ.sqfbcz
  is '申请分别持证';
comment on column WW_DJSQ.qxdm
  is '区县代码';
comment on column WW_DJSQ.spyj
  is '预审意见';
comment on column WW_DJSQ.spr
  is '预审人';
comment on column WW_DJSQ.spzt
  is '审批状态';
comment on column WW_DJSQ.sprq
  is '审批日期';
comment on column WW_DJSQ.ajzt
  is '案件状态';
comment on column WW_DJSQ.bz
  is '备注';
comment on column WW_DJSQ.sqr
  is '申请人';
comment on column WW_DJSQ.dccs
  is '导出次数';
comment on column WW_DJSQ.blwd
  is '办理网点';
comment on column WW_DJSQ.dycs
  is '打印次数';
comment on column WW_DJSQ.htbh
  is '合同编号';
comment on column WW_DJSQ.xgzh
  is '初始证号';
comment on column WW_DJSQ.sfzsbd
  is '是否真实表达';
comment on column WW_DJSQ.sfzsyx
  is '是否真实有效';
comment on column WW_DJSQ.gyfs
  is '共有方式';
comment on column WW_DJSQ.sqrsfzh
  is '申请人证件号码';
comment on column WW_DJSQ.sqrdhhm
  is '申请人电话号码';
comment on column WW_DJSQ.fsr
  is '复审人';
comment on column WW_DJSQ.fsyj
  is '复审意见';
comment on column WW_DJSQ.fsrq
  is '复审日期';
comment on column WW_DJSQ.dklx
  is '贷款类型';
comment on column WW_DJSQ.blwdid
  is '网点ID';
comment on column WW_DJSQ.ywmx
  is '业务模型';
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
  is '抵押类业务申请';
comment on column WW_DYSQ.sqbh
  is '申请编号';
comment on column WW_DYSQ.xgzh
  is '相关不动产证/证明号';
comment on column WW_DYSQ.dylx
  is '抵押类型';
comment on column WW_DYSQ.dysw
  is '抵押顺位';
comment on column WW_DYSQ.zwr
  is '债务人';
comment on column WW_DYSQ.zwrzjlx
  is '债务人证件类型';
comment on column WW_DYSQ.zwrzjh
  is '债务人证件号';
comment on column WW_DYSQ.dyfs
  is '抵押方式';
comment on column WW_DYSQ.dymj
  is '抵押面积';
comment on column WW_DYSQ.zjjzwzl
  is '在建建筑物坐落';
comment on column WW_DYSQ.zjjzwdyfw
  is '在建建筑物抵押范围';
comment on column WW_DYSQ.bdbzzqse
  is '被担保主债权数额';
comment on column WW_DYSQ.pgje
  is '不动产评估价格/金额';
comment on column WW_DYSQ.dbfw
  is '担保范围';
comment on column WW_DYSQ.zgzqqdss
  is '最高债权确定事实';
comment on column WW_DYSQ.zgzqse
  is '最高债权数额';
comment on column WW_DYSQ.dyqx
  is '抵押期限';
comment on column WW_DYSQ.qlqssj
  is '权利起始时间';
comment on column WW_DYSQ.qljssj
  is '权利结束时间';
comment on column WW_DYSQ.bdcdyh
  is '不动产单元号';
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
  is '附件清单';
comment on column WW_FJQD.qdid
  is '清单ID';
comment on column WW_FJQD.sqbh
  is '申请编号';
comment on column WW_FJQD.xh
  is '序号';
comment on column WW_FJQD.fjmc
  is '附件名称';
comment on column WW_FJQD.fjlx
  is '附件类型';
comment on column WW_FJQD.ftplj
  is '附件路径';
comment on column WW_FJQD.fjdx
  is '附件大小';
comment on column WW_FJQD.fjnr
  is '附件内容';
comment on column WW_FJQD.fjzt
  is '附件状态';
comment on column WW_FJQD.fjtjsj
  is '附件添加时间';
comment on column WW_FJQD.fjkzm
  is '附件扩展名';
comment on column WW_FJQD.fjml
  is '附件目录';
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
  is '权证类业务申请';
comment on column WW_QSSQ.sqbh
  is '申请编号';
comment on column WW_QSSQ.xgzh
  is '相关证书/证明号';
comment on column WW_QSSQ.bdcdyh
  is '不动产单元号';
comment on column WW_QSSQ.fwbh
  is '房屋编号';
comment on column WW_QSSQ.zh
  is '幢号';
comment on column WW_QSSQ.hh
  is '户号';
comment on column WW_QSSQ.dyh
  is '单元号';
comment on column WW_QSSQ.fjh
  is '房间号';
comment on column WW_QSSQ.gyfs
  is '共有方式';
comment on column WW_QSSQ.gyfe
  is '共有份额';
comment on column WW_QSSQ.qdjg
  is '取得价格';
comment on column WW_QSSQ.qdfs
  is '取得方式';
comment on column WW_QSSQ.fwlx
  is '房屋类型';
comment on column WW_QSSQ.fwxz
  is '房屋性质';
comment on column WW_QSSQ.cg
  is '层高';
comment on column WW_QSSQ.sjcs
  is '实际层数';
comment on column WW_QSSQ.jzmj
  is '建筑面积';
comment on column WW_QSSQ.tnjzmj
  is '套内建筑面积';
comment on column WW_QSSQ.ftjzmj
  is '分摊建筑面积';
comment on column WW_QSSQ.qllx
  is '权利类型';
comment on column WW_QSSQ.qlxz
  is '权利性质';
comment on column WW_QSSQ.tdzzrq
  is '土地终止日期';
comment on column WW_QSSQ.tdyt
  is '土地用途';
comment on column WW_QSSQ.tdsyqr
  is '土地使用权人';
comment on column WW_QSSQ.gytdmj
  is '土地使用面积';
comment on column WW_QSSQ.fttdmj
  is '分摊土地面积';
comment on column WW_QSSQ.dytdmj
  is '独用土地面积';
comment on column WW_QSSQ.tdsyqssj
  is '土地使用起始时间';
comment on column WW_QSSQ.tdsyjssj
  is '土地使用结束时间';
comment on column WW_QSSQ.fwzl
  is '房屋坐落';
comment on column WW_QSSQ.syqx
  is '使用期限';
comment on column WW_QSSQ.ghyt
  is '规划用途';
comment on column WW_QSSQ.fdcjyjg
  is '房地产交易价格';
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
  is '上门服务申请';
comment on column WW_SMFWSQ.sqbh
  is '申请编号';
comment on column WW_SMFWSQ.sqrq
  is '申请日期';
comment on column WW_SMFWSQ.sqrid
  is '申请人ID';
comment on column WW_SMFWSQ.sqrzjhm
  is '申请人证件号码';
comment on column WW_SMFWSQ.sqrdhhm
  is '申请人电话号码';
comment on column WW_SMFWSQ.sqrxm
  is '申请人姓名';
comment on column WW_SMFWSQ.xblyw
  is '需办理业务';
comment on column WW_SMFWSQ.sqyy
  is '申请原因';
comment on column WW_SMFWSQ.dz
  is '上门服务地址';
comment on column WW_SMFWSQ.spzt
  is '审批状态';
comment on column WW_SMFWSQ.spr
  is '审批人';
comment on column WW_SMFWSQ.sprq
  is '审批日期';
comment on column WW_SMFWSQ.spyj
  is '审批意见';
comment on column WW_SMFWSQ.dccs
  is '导出次数';
comment on column WW_SMFWSQ.spbz
  is '审批备注';
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
  is '申请人信息';
comment on column WW_SQRXX.glbh
  is '关联编号';
comment on column WW_SQRXX.sqbh
  is '业务编号';
comment on column WW_SQRXX.sqrmc
  is '申请人名称';
comment on column WW_SQRXX.zjlb
  is '证件类别';
comment on column WW_SQRXX.zjhm
  is '证件号码';
comment on column WW_SQRXX.dh
  is '电话';
comment on column WW_SQRXX.yb
  is '邮编';
comment on column WW_SQRXX.dz
  is '地址';
comment on column WW_SQRXX.sqrlx
  is '申请人类型';
comment on column WW_SQRXX.sxh
  is '顺序号';
comment on column WW_SQRXX.gyfe
  is '共有份额';
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
  is '图属关联';
comment on column WW_TSGL.glbm
  is '关联编码';
comment on column WW_TSGL.sqbh
  is '申请编号';
comment on column WW_TSGL.bdclx
  is '不动产类型';
comment on column WW_TSGL.tstybm
  is '不动产图属统一编码';
comment on column WW_TSGL.bdcdyh
  is '不动产单元号';
comment on column WW_TSGL.djzl
  is '登记种类';
comment on column WW_TSGL.glms
  is '关联模式';
comment on column WW_TSGL.cssj
  is '产生时间';
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
  is '投诉与建议';
comment on column WW_TSJY.bh
  is '编号';
comment on column WW_TSJY.tjrq
  is '提交日期';
comment on column WW_TSJY.tjrid
  is '提交人ID';
comment on column WW_TSJY.tjrzjhm
  is '提交人证件号码';
comment on column WW_TSJY.tjrdhhm
  is '提交人电话号码';
comment on column WW_TSJY.tjrxm
  is '提交人姓名';
comment on column WW_TSJY.nr
  is '内容';
comment on column WW_TSJY.sfsy
  is '是否审阅';
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
  is '在线预约叫号池';
comment on column WW_YYJHC.jhcid
  is '主键ID';
comment on column WW_YYJHC.bsid
  is '叫号标识';
comment on column WW_YYJHC.yyrq
  is '预约日期';
comment on column WW_YYJHC.blwd
  is '办理网点';
comment on column WW_YYJHC.sjd
  is '时间段';
comment on column WW_YYJHC.qssj
  is '起始时间';
comment on column WW_YYJHC.jssj
  is '结束时间';
comment on column WW_YYJHC.djdl
  is '登记大类';
comment on column WW_YYJHC.qz
  is '前缀';
comment on column WW_YYJHC.bh
  is '预约编号';
comment on column WW_YYJHC.zt
  is '编号状态';
comment on column WW_YYJHC.bz
  is '备注';
comment on column WW_YYJHC.czsj
  is '最后一次操作时间';
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
  is '预约占号';
comment on column WW_YYZH.zhid
  is '主键';
comment on column WW_YYZH.blwd
  is '办理网点';
comment on column WW_YYZH.blsjd
  is '办理时间段';
comment on column WW_YYZH.djdl
  is '登记大类';
comment on column WW_YYZH.ywlx
  is '业务类型';
comment on column WW_YYZH.kyyrq
  is '可预约日期';
comment on column WW_YYZH.kyyzs
  is '可预约总数';
comment on column WW_YYZH.zhs
  is '占号数量';
comment on column WW_YYZH.sffqh
  is '是否废弃号';
comment on column WW_YYZH.sftsh
  is '是否特殊号';
comment on column WW_YYZH.czr
  is '操作人';
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
  is '证书验证';
comment on column WW_ZSYZ.cxbh
  is '查询编号';
comment on column WW_ZSYZ.cxrq
  is '查询日期';
comment on column WW_ZSYZ.cxrxm
  is '查询人姓名';
comment on column WW_ZSYZ.cxfs
  is '查询方式';
comment on column WW_ZSYZ.bdczl
  is '不行产坐落';
comment on column WW_ZSYZ.bdczsh
  is '不行产证号';
comment on column WW_ZSYZ.qlrmc
  is '权利人';
comment on column WW_ZSYZ.bdcdyh
  is '不行产单元号';
comment on column WW_ZSYZ.syqx
  is '使用期限';
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
  is '在线预约';
comment on column WW_ZXYY.sqbh
  is '申请编号';
comment on column WW_ZXYY.yysqrq
  is '预约申请日期';
comment on column WW_ZXYY.yyrxm
  is '预约人姓名';
comment on column WW_ZXYY.yyrzjhm
  is '预约人证件号';
comment on column WW_ZXYY.yyrdhhm
  is '预约人电话号码';
comment on column WW_ZXYY.ywlx
  is '业务类型';
comment on column WW_ZXYY.sldw
  is '受理单位';
comment on column WW_ZXYY.bdcszq
  is '不动产所在区';
comment on column WW_ZXYY.fdcmc
  is '房地产名称';
comment on column WW_ZXYY.qszmlx
  is '权属证明类型';
comment on column WW_ZXYY.qszmh
  is '权属证明号';
comment on column WW_ZXYY.yysj
  is '预约时间';
comment on column WW_ZXYY.yybh
  is '预约编号';
comment on column WW_ZXYY.yyzt
  is '预约状态';
comment on column WW_ZXYY.dccs
  is '导出次数';
comment on column WW_ZXYY.yydlr
  is '预约代理人';
comment on column WW_ZXYY.djlx
  is '登记类型';
comment on column WW_ZXYY.yyxh
  is '预约序号';
comment on column WW_ZXYY.yyrcode
  is '预约人usercode';
comment on column WW_ZXYY.yysjd
  is '预约时间段';
comment on column WW_ZXYY.ywlxid
  is '业务类型ID';
comment on column WW_ZXYY.djdlid
  is '业务大类ID';
comment on column WW_ZXYY.sftsh
  is '是否特殊号（是/否）';
comment on column WW_ZXYY.sysname
  is '叫号名称';
comment on column WW_ZXYY.keynum
  is '叫号值';
comment on column WW_ZXYY.yynum
  is '叫号处理后的预约号';
comment on column WW_ZXYY.sjd
  is '预约时间段ID';
comment on column WW_ZXYY.qssj
  is '时间段起始时间';
comment on column WW_ZXYY.jssj
  is '时间段结束时间';
comment on column WW_ZXYY.qxr
  is '预约取消人';
comment on column WW_ZXYY.qxsj
  is '预约取消时间';
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
  is '相关登记关联';
comment on column XGDJGL.bgbm
  is '变更编码';
comment on column XGDJGL.zywh
  is '子业务号';
comment on column XGDJGL.fywh
  is '父业务号';
comment on column XGDJGL.bgrq
  is '变更日期';
comment on column XGDJGL.bglx
  is '变更类型';

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
  is '预告登记';
comment on column YGDJ.ywh
  is '业务号';
comment on column YGDJ.ysdm
  is '要素代码';
comment on column YGDJ.bdcdyh
  is '不动产单元号';
comment on column YGDJ.bdczl
  is '不动产坐落';
comment on column YGDJ.ywr
  is '义务人';
comment on column YGDJ.ywrzjzl
  is '义务人证件种类';
comment on column YGDJ.ywrzjh
  is '义务人证件号';
comment on column YGDJ.ygdjzl
  is '预告登记种类';
comment on column YGDJ.djlx
  is '登记类型';
comment on column YGDJ.djyy
  is '登记原因';
comment on column YGDJ.tdsyqr
  is '土地使用权人';
comment on column YGDJ.ghyt
  is '规划用途';
comment on column YGDJ.fwxz
  is '房屋性质';
comment on column YGDJ.fwjg
  is '房屋结构';
comment on column YGDJ.szc
  is '所在层';
comment on column YGDJ.zcs
  is '总层数';
comment on column YGDJ.jzmj
  is '建筑面积';
comment on column YGDJ.qdjg
  is '取得价格/被担保主债权数额';
comment on column YGDJ.bdcdjzmh
  is '不动产登记证明号';
comment on column YGDJ.qxdm
  is '区县代码';
comment on column YGDJ.djjg
  is '登记机构';
comment on column YGDJ.dbr
  is '登簿人';
comment on column YGDJ.djsj
  is '登记时间';
comment on column YGDJ.qlqtzk
  is '权利其他状况';
comment on column YGDJ.fj
  is '附记';
comment on column YGDJ.qszt
  is '权属状态';
comment on column YGDJ.ytmc
  is '用途名称';
comment on column YGDJ.fwxzmc
  is '房屋性质名称';
comment on column YGDJ.zxygywh
  is '注销预告业务号';
comment on column YGDJ.zxygyy
  is '注销预告原因';
comment on column YGDJ.zxsj
  is '注销时间';

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
  is '用海状况';
comment on column YHZK.zdid
  is '宗海ID';
comment on column YHZK.zhdm
  is '宗海代码';
comment on column YHZK.yhfs
  is '用海方式';
comment on column YHZK.yhmj
  is '用海面积';
comment on column YHZK.jtyt
  is '具体用途';
comment on column YHZK.syjse
  is '使用金数额';
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
  is '房产预售许可';
comment on column YSXK.xkbh
  is '许可编号';
comment on column YSXK.xkzh
  is '许可证号';
comment on column YSXK.gsmc
  is '公司名称';
comment on column YSXK.xmmc
  is '项目名称';
comment on column YSXK.xmbh
  is '项目编号';
comment on column YSXK.yjjgmj
  is '预计竣工面积';
comment on column YSXK.yjjgts
  is '预计竣工套数';
comment on column YSXK.yjjgrq
  is '预计竣工日期';
comment on column YSXK.fwlx
  is '房屋类型';
comment on column YSXK.jzlx
  is '建筑类型';
comment on column YSXK.jzjg
  is '建筑结构';
comment on column YSXK.fwzh
  is '房屋幢号';
comment on column YSXK.cs
  is '层数';
comment on column YSXK.ts
  is '套数';
comment on column YSXK.zjzmj
  is '总建筑面积';
comment on column YSXK.xkmj
  is '许可面积';
comment on column YSXK.xkts
  is '许可套数';
comment on column YSXK.xsksrq
  is '销售开始日期';
comment on column YSXK.xsjsrq
  is '销售结束日期';
comment on column YSXK.pzyszfmj
  is '批准预售住房面积';
comment on column YSXK.zfyssbpjjg
  is '住房预售申报平均价格';
comment on column YSXK.pzyssyyyyfzmj
  is '批准预售商业营业用房总面积';
comment on column YSXK.syyyyfsbpjjg
  is '商业营业用房申报平均价格';
comment on column YSXK.pzysbglzmj
  is '批准预售办公楼总面积';
comment on column YSXK.bglyssbpjjg
  is '办公楼预售申报平均价格';
comment on column YSXK.pzysqtfwzmj
  is '批准预售其他房屋总面积';
comment on column YSXK.qtfwsbpjjg
  is '其他房屋申报平均价格';
comment on column YSXK.yxkzh
  is '原许可证号';
comment on column YSXK.ssjc
  is '省市简称';
comment on column YSXK.jgjc
  is '机构简称';
comment on column YSXK.fznd
  is '发证年度';
comment on column YSXK.zsh
  is '证书号';
comment on column YSXK.djrq
  is '登记日期';
comment on column YSXK.fddbr
  is '法定代表人';
comment on column YSXK.xmdz
  is '项目地址';
comment on column YSXK.ghyt
  is '规划用途';
comment on column YSXK.bz
  is '备注';
comment on column YSXK.spbz
  is '审批备注';
comment on column YSXK.qszt
  is '权属状态';
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
  is '异议登记';
comment on column YYDJ.ywh
  is '业务号';
comment on column YYDJ.ysdm
  is '要素代码';
comment on column YYDJ.bdcdyh
  is '不动产单元号';
comment on column YYDJ.yysx
  is '异议事项';
comment on column YYDJ.bdcdjzmh
  is '不动产登记证明号';
comment on column YYDJ.qxdm
  is '区县代码';
comment on column YYDJ.djjg
  is '登记机构';
comment on column YYDJ.dbr
  is '登簿人';
comment on column YYDJ.djsj
  is '登记时间';
comment on column YYDJ.zxyyywh
  is '注销异议业务号';
comment on column YYDJ.zxyyyy
  is '注销异议原因';
comment on column YYDJ.zxyydbr
  is '注销异议登簿人';
comment on column YYDJ.zxyydjsj
  is '注销异议登记时间';
comment on column YYDJ.qlqtzk
  is '权利其他状况';
comment on column YYDJ.fj
  is '附记';
comment on column YYDJ.qszt
  is '权属状态';

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
  is '宗地基本信息';
comment on column ZDJBXX.zdid
  is '宗地ID';
comment on column ZDJBXX.bsm
  is '标识码';
comment on column ZDJBXX.ysdm
  is '要素代码';
comment on column ZDJBXX.zddm
  is '宗地代码';
comment on column ZDJBXX.bdcdyh
  is '不动产单元号';
comment on column ZDJBXX.zdtzm
  is '宗地特征码';
comment on column ZDJBXX.zl
  is '坐落';
comment on column ZDJBXX.zdmj
  is '宗地面积';
comment on column ZDJBXX.mjdw
  is '面积单位';
comment on column ZDJBXX.yt
  is '用途';
comment on column ZDJBXX.ytmc
  is '用途名称';
comment on column ZDJBXX.dj
  is '等级';
comment on column ZDJBXX.jg
  is '价格';
comment on column ZDJBXX.qllx
  is '权利类型';
comment on column ZDJBXX.qlxz
  is '权利性质';
comment on column ZDJBXX.qlsdfs
  is '权利设定方式';
comment on column ZDJBXX.rjl
  is '容积率';
comment on column ZDJBXX.jzmd
  is '建筑密度';
comment on column ZDJBXX.jzxg
  is '建筑限高';
comment on column ZDJBXX.zdszd
  is '宗地四至-东';
comment on column ZDJBXX.zdszn
  is '宗地四至-南';
comment on column ZDJBXX.zdszx
  is '宗地四至-西';
comment on column ZDJBXX.zdszb
  is '宗地四至-北';
comment on column ZDJBXX.zdt
  is '宗地图';
comment on column ZDJBXX.tfh
  is '图幅号';
comment on column ZDJBXX.djh
  is '地籍号';
comment on column ZDJBXX.dah
  is '档案号';
comment on column ZDJBXX.bz
  is '备注';
comment on column ZDJBXX.zt
  is '状态';
comment on column ZDJBXX.isrghs
  is '是否人工核实';
comment on column ZDJBXX.rghsry
  is '人工核实人员';
comment on column ZDJBXX.rghsrq
  is '人工核实日期';
comment on column ZDJBXX.dcsj
  is '调查时间';
comment on column ZDJBXX.bgjzxx
  is '变更禁止信息';
comment on column ZDJBXX.bgtsxx
  is '变更提示信息';

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
  is '宗海基本信息';
comment on column ZHJBXX.zhid
  is '宗海ID';
comment on column ZHJBXX.bsm
  is '标识码';
comment on column ZHJBXX.ysdm
  is '要素代码';
comment on column ZHJBXX.zhdm
  is '宗海代码';
comment on column ZHJBXX.bdcdyh
  is '不动产单元号';
comment on column ZHJBXX.zhtzm
  is '宗海特征码';
comment on column ZHJBXX.xmmc
  is '项目名称';
comment on column ZHJBXX.xmxz
  is '项目性质';
comment on column ZHJBXX.yhzmj
  is '用海总面积';
comment on column ZHJBXX.zhmj
  is '宗海面积';
comment on column ZHJBXX.db
  is '等别';
comment on column ZHJBXX.zhax
  is '占海岸线';
comment on column ZHJBXX.yhlxa
  is '用海类型A';
comment on column ZHJBXX.yhlxb
  is '用海类型B';
comment on column ZHJBXX.yhwzsm
  is '用海位置说明';
comment on column ZHJBXX.hdmc
  is '海岛名称';
comment on column ZHJBXX.hddm
  is '海岛代码';
comment on column ZHJBXX.ydfw
  is '用岛范围';
comment on column ZHJBXX.ydmj
  is '用岛面积';
comment on column ZHJBXX.hdwz
  is '海岛位置';
comment on column ZHJBXX.hdyt
  is '海岛用途';
comment on column ZHJBXX.hdytmc
  is '海岛用途名称';
comment on column ZHJBXX.zht
  is '宗海图';
comment on column ZHJBXX.dah
  is '档案号';
comment on column ZHJBXX.zt
  is '状态';
comment on column ZHJBXX.dcsj
  is '调查时间';
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
  is '注销登记';
comment on column ZXDJ.zxywh
  is '注销业务号';
comment on column ZXDJ.ysdm
  is '要素代码';
comment on column ZXDJ.bdcdyh
  is '不动产单元号';
comment on column ZXDJ.bdcqz
  is '不动产权证号';
comment on column ZXDJ.ywh
  is '原证业务号';
comment on column ZXDJ.qxdm
  is '区县代码';
comment on column ZXDJ.djjg
  is '登记机构';
comment on column ZXDJ.dbr
  is '登簿人';
comment on column ZXDJ.djsj
  is '登记时间';
comment on column ZXDJ.qlqtzk
  is '权利其他状况';
comment on column ZXDJ.djyy
  is '登记原因';
comment on column ZXDJ.fj
  is '附记';
comment on column ZXDJ.qszt
  is '权属状态';


spool off
