-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2021 a las 21:27:08
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comercio_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE IF NOT EXISTS `articulo` (
  `idArticulo` varchar(13) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `PrecioCompra` decimal(10,2) NOT NULL,
  `PrecioVenta` decimal(10,2) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Rubro` varchar(45) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `Descripcion`, `PrecioCompra`, `PrecioVenta`, `Marca`, `Rubro`, `Imagen`) VALUES
('Ais0001', 'Burbujas x 15', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0002', 'Burbujas x 30', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0003', 'Burbuja doble aluminio x 30 mts', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0004', 'Espumas x 20 mts x 5', '0.00', '2500.00', 'Aserradero', 'Aislantes', ''),
('Ais0005', 'Espuma doble al x 20 mts x 10 m', '0.00', '3500.00', 'Aserradero', 'Aislantes', ''),
('Ais0006', 'aislante esp doble alum 10mmx20', '0.00', '5600.00', 'Aserradero', 'Aislantes', ''),
('Ais0007', 'Lana de vidrio c/aluminio', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0008', 'Red p/aislante por m2', '0.00', '60.00', 'Aserradero', 'Aislantes', ''),
('Ais0009', 'Ruberoid liv. 20 mts', '0.00', '1400.00', 'Aserradero', 'Aislantes', ''),
('Ais0010', 'Ruberoid liv. 40 mts', '0.00', '2600.00', 'Aserradero', 'Aislantes', ''),
('Ais0011', 'Ruberoid pes. 20 mts', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0012', 'Ruberoid pes. 40 mts', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Ais0013', 'Telgopor x m2', '0.00', '0.00', 'Aserradero', 'Aislantes', ''),
('Fer0001', 'Clavos Puntera Paris', '0.00', '700.00', 'Aserradero', 'Ferreteria', ''),
('Fer0002', 'Clavos de 7 y 8 pulgadas c/u', '0.00', '17.00', 'Aserradero', 'Ferreteria', ''),
('Fer0003', 'Clavos Plomo comun', '0.00', '700.00', 'Aserradero', 'Ferreteria', ''),
('Fer0004', 'Clavos de plomo Acindar', '0.00', '700.00', 'Aserradero', 'Ferreteria', ''),
('Fer0005', 'Clavos paraguas', '0.00', '0.00', 'Aserradero', 'Ferreteria', ''),
('Fer0006', 'Clavos espiralados', '0.00', '600.00', 'Aserradero', 'Ferreteria', ''),
('Fer0007', 'Clavos c/perdida', '0.00', '700.00', 'Aserradero', 'Ferreteria', ''),
('Fer0008', 'Tornillos autoperforantes c/u ', '0.00', '17.00', 'Aserradero', 'Ferreteria', ''),
('Fer0009', 'Alambre', '0.00', '700.00', 'Aserradero', 'Ferreteria', ''),
('Fer0010', 'Clavos de cobre', '0.00', '0.00', 'Aserradero', 'Ferreteria', ''),
('Fer0011', 'Cola vinilica 250 gr', '0.00', '250.00', 'Aserradero', 'Ferreteria', ''),
('Fer0012', 'Cola vinilica 500 gr', '0.00', '350.00', 'Aserradero', 'Ferreteria', ''),
('Fer0013', 'Cola vinilica 1000 gr', '0.00', '550.00', 'Aserradero', 'Ferreteria', ''),
('Fer0014', 'Mensula  2x4', '0.00', '200.00', 'Aserradero', 'Ferreteria', ''),
('Fer0015', 'Mensula  2x5', '0.00', '250.00', 'Aserradero', 'Ferreteria', ''),
('Fer0016', 'Mensula  2x6', '0.00', '300.00', 'Aserradero', 'Ferreteria', ''),
('Fer0017', 'Mensula  3x6', '0.00', '350.00', 'Aserradero', 'Ferreteria', ''),
('Fer0018', 'Mensula  3x8', '0.00', '450.00', 'Aserradero', 'Ferreteria', ''),
('Her0001', 'Base columna c/pie 4x4', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0002', 'Base columna c/pie 5x5', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0003', 'Base columna c/pie 6x6', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0004', 'Base columna s/pie 4x4', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0005', 'Base columna s/pie 5x5', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0006', 'Base columna s/pie 5x5', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0007', 'Empalme 2x6', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Her0008', 'Empalme 2x5', '0.00', '0.00', 'Aserradero', 'Herreria', ''),
('Mac0001', 'Machimbre 1/2\" x 3', '0.00', '250.00', 'Aserradero', 'Machimbres', ''),
('Mac0002', 'Machimbre 1/2x4 1ra', '0.00', '450.00', 'Aserradero', 'Machimbres', ''),
('Mac0003', 'Machimbre 1/2x4 2da', '0.00', '350.00', 'Aserradero', 'Machimbres', ''),
('Mac0004', 'Machimbre 1/2x51 ra', '0.00', '450.00', 'Aserradero', 'Machimbres', ''),
('Mac0005', 'Machimbre 1/2x51 da', '0.00', '350.00', 'Aserradero', 'Machimbres', ''),
('Mac0006', 'Machimbre 1\" x4 5 o 6 1ra', '0.00', '1000.00', 'Aserradero', 'Machimbres', ''),
('Mac0007', 'Machimbre 1\"x4 5 o 6 da', '0.00', '850.00', 'Aserradero', 'Machimbres', ''),
('Pre0001', 'Dharma x 1 lts', '0.00', '350.00', 'Aserradero', 'Preservadores', ''),
('Pre0002', 'Dharma x 4 lts', '0.00', '1000.00', 'Aserradero', 'Preservadores', ''),
('Pre0003', 'Dharma x 10 lts', '0.00', '1900.00', 'Aserradero', 'Preservadores', ''),
('Pre0004', 'Dharma x 18 lts', '0.00', '3000.00', 'Aserradero', 'Preservadores', ''),
('Pre0005', 'Impregnante Iasur x 1 lts', '0.00', '900.00', 'Aserradero', 'Preservadores', ''),
('Pre0006', 'Impregnante Iasur x 4 lts', '0.00', '3000.00', 'Aserradero', 'Preservadores', ''),
('Pre0007', 'Impregnante Iasur x 18 lts', '0.00', '0.00', 'Aserradero', 'Preservadores', ''),
('Pre0008', 'Aceite de lino', '0.00', '350.00', 'Aserradero', 'Preservadores', ''),
('Tab0001', 'tablas 1x3 costruccion x ml', '1.00', '80.00', 'Aserradero', 'Tablas', ''),
('Tab0002', 'tablas 1x3 cepillado x ml', '1.00', '110.00', 'Aserradero', 'Tablas', ''),
('Tab0003', 'tablas  1x4 costruccion x ml', '1.00', '100.00', 'Aserradero', 'Tablas', ''),
('Tab0004', 'tablas 1x4 cepilladas x ml', '1.00', '120.00', 'Aserradero', 'Tablas', ''),
('Tab0005', 'tablas 1x5 costruccion x ml', '1.00', '110.00', 'Aserradero', 'Tablas', ''),
('Tab0006', 'tablas  1x5 cepilladas x ml', '1.00', '140.00', 'Aserradero', 'Tablas', ''),
('Tab0007', 'tablas 1x6 contruccion x ml', '1.00', '120.00', 'Aserradero', 'Tablas', ''),
('Ter0001', 'Rinconeros finos', '0.00', '240.00', 'Aserradero', 'Terminaciones', ''),
('Ter0002', 'Rinconeros anchos', '0.00', '360.00', 'Aserradero', 'Terminaciones', ''),
('Ter0003', 'Tapajuntas 1/2 x 1', '0.00', '0.00', 'Aserradero', 'Terminaciones', ''),
('Ter0004', 'Tapajuntas 1/2 x 2', '0.00', '220.00', 'Aserradero', 'Terminaciones', ''),
('Ter0005', 'Tapajuntas 1/2 x 3', '0.00', '270.00', 'Aserradero', 'Terminaciones', ''),
('Ter0006', 'Terminacion L ancha', '0.00', '270.00', 'Aserradero', 'Terminaciones', ''),
('Ter0007', 'Zocalo liso 1/2 x3', '0.00', '240.00', 'Aserradero', 'Terminaciones', ''),
('Ter0008', 'Zocalo 3/4 x 3', '0.00', '330.00', 'Aserradero', 'Terminaciones', ''),
('Ter0009', 'Zocalo 3/4 x 4', '0.00', '380.00', 'Aserradero', 'Terminaciones', ''),
('Ter0010', 'Pasamano x 3 mts', '0.00', '850.00', 'Aserradero', 'Terminaciones', ''),
('Ter0011', 'Guardilla mold x ', '0.00', '380.00', 'Aserradero', 'Terminaciones', ''),
('Tir0001', 'Tirantes 2 x 4 2 mts', '0.00', '400.00', 'Aserradero', 'Tiranteria', ''),
('Tir0002', 'Tirantes 2 x 4 2,5 mts', '0.00', '490.00', 'Aserradero', 'Tiranteria', ''),
('Tir0003', 'Tirantes 2 x 4 3 mts', '0.00', '560.00', 'Aserradero', 'Tiranteria', ''),
('Tir0004', 'Tirantes 2 x 4 3,5 mts', '0.00', '660.00', 'Aserradero', 'Tiranteria', ''),
('Tir0005', 'Tirantes 2 x 4 4 mts', '0.00', '870.00', 'Aserradero', 'Tiranteria', ''),
('Tir0006', 'Tirantes 2 x 4 4,5 mts', '0.00', '970.00', 'Aserradero', 'Tiranteria', ''),
('Tir0007', 'Tirantes 2 x 4 5 mts', '0.00', '1100.00', 'Aserradero', 'Tiranteria', ''),
('Tir0008', 'Tirantes 2 X 5 2 mts', '0.00', '490.00', 'Aserradero', 'Tiranteria', ''),
('Tir0009', 'Tirantes 2 X 5 2,5 mts', '0.00', '600.00', 'Aserradero', 'Tiranteria', ''),
('Tir0010', 'Tirantes 2 X 5 3 mts', '0.00', '700.00', 'Aserradero', 'Tiranteria', ''),
('Tir0011', 'Tirantes 2 X 5 3,5 mts', '0.00', '800.00', 'Aserradero', 'Tiranteria', ''),
('Tir0012', 'Tirantes 2 X 5 4 mts', '0.00', '920.00', 'Aserradero', 'Tiranteria', ''),
('Tir0013', 'Tirantes 2 X 5 4,5 mts', '0.00', '1200.00', 'Aserradero', 'Tiranteria', ''),
('Tir0014', 'Tirantes 2 X 5 5 mts', '0.00', '1350.00', 'Aserradero', 'Tiranteria', ''),
('Tir0015', 'Tirantes 2 X 5 5,5 mts', '0.00', '1500.00', 'Aserradero', 'Tiranteria', ''),
('Tir0016', 'Tirantes 2 X 5 6 mts', '0.00', '1600.00', 'Aserradero', 'Tiranteria', ''),
('Tir0017', 'Tirantes 2 X 6 2 mts', '0.00', '600.00', 'Aserradero', 'Tiranteria', ''),
('Tir0018', 'Tirantes 2 X 6 2,5 mts', '0.00', '700.00', 'Aserradero', 'Tiranteria', ''),
('Tir0019', 'Tirantes 2 X 6 3 mts', '0.00', '920.00', 'Aserradero', 'Tiranteria', ''),
('Tir0020', 'Tirantes 2 X 6 3,5 mts', '0.00', '1080.00', 'Aserradero', 'Tiranteria', ''),
('Tir0021', 'Tirantes 2 X 6 4 mts', '0.00', '1230.00', 'Aserradero', 'Tiranteria', ''),
('Tir0022', 'Tirantes 2 X 6 4,5 mts', '0.00', '1500.00', 'Aserradero', 'Tiranteria', ''),
('Tir0023', 'Tirantes 2 X 6 5 mts', '0.00', '1760.00', 'Aserradero', 'Tiranteria', ''),
('Tir0024', 'Tirantes 2 X 6 5,5 mts', '0.00', '1940.00', 'Aserradero', 'Tiranteria', ''),
('Tir0025', 'Tirantes 2 X 6 6 mts', '0.00', '2300.00', 'Aserradero', 'Tiranteria', ''),
('Tir0026', 'Tirantes 2 X 6 6,5 mts', '0.00', '3000.00', 'Aserradero', 'Tiranteria', ''),
('Tir0027', 'Tirantes 2 X 6 7 mts', '0.00', '3500.00', 'Aserradero', 'Tiranteria', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `codCaja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `operador` varchar(45) NOT NULL,
  `operacion` varchar(45) NOT NULL,
  `tipo_comprobante` varchar(45) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `ingreso` decimal(10,2) NOT NULL,
  `egreso` decimal(10,2) NOT NULL,
  `saldoinicial` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`codCaja`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`codCaja`, `fecha`, `operador`, `operacion`, `tipo_comprobante`, `serie`, `descripcion`, `ingreso`, `egreso`, `saldoinicial`, `saldo`) VALUES
(25, '2021-10-15', 'gdjuarez', 'INGRESO', 'Factura', '00011568', 'ingreso dinero', '1500.00', '0.00', '0.00', '1500.00'),
(26, '2021-10-15', 'gdjuarez', 'EGRESO', 'Factura', '2588', 'yerba', '0.00', '100.00', '0.00', '1400.00'),
(28, '2021-10-15', 'gdjuarez', 'INGRESO', 'Sin comprobante', '001', 'caramelos', '154.00', '0.00', '0.00', '1554.00'),
(29, '2021-10-15', 'gdjuarez', 'INGRESO', 'Factura', '', '', '154.00', '0.00', '0.00', '1708.00'),
(30, '2021-10-18', 'gdjuarez', 'INGRESO', 'Factura', '565656', 'gaseosa', '80.00', '0.00', '1708.00', '1788.00'),
(34, '2021-10-18', 'gdjuarez', 'INGRESO', 'Factura', '', '', '100.00', '0.00', '1708.00', '1968.00'),
(35, '2021-10-18', 'gdjuarez', 'EGRESO', 'Factura', '', '', '0.00', '888.00', '1708.00', '1000.00'),
(36, '2021-10-19', 'gdjuarez', 'EGRESO', 'Factura', '', 'retiro', '0.00', '500.00', '1000.00', '500.00'),
(37, '2021-10-19', 'gdjuarez', 'INGRESO', 'Factura', '6567', 'cajon de gaseosa', '1200.00', '0.00', '1000.00', '1200.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `codCliente` varchar(11) NOT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `TelFijo` varchar(45) DEFAULT NULL,
  `TelCelular` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `CodigoPostal` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCliente`, `Apellido`, `Nombre`, `RazonSocial`, `Domicilio`, `TelFijo`, `TelCelular`, `Email`, `Ciudad`, `CodigoPostal`, `Provincia`) VALUES
('', '', '', '', '', '', '', '', '', '', ''),
('00000000001', 'Consumidor Final', '', '', '', '', '', '', 'Mercedes', '6600', 'Buenos Aires'),
('20255729145', 'Perretti', 'Federico', 'Itterrep', 'calle Nº 873', '+542324690313', '2324 475632', 'federicoperretti@gmail.com', 'Mercedes', '6600', 'Bs As'),
('23205268669', 'Juarez', 'Gustavo Damian', 'GifSys', '106 419', '433150', '505930', 'gdjuarez@hotmail.com', 'Mercedes', '6600', 'Buenos Aires'),
('23892144', 'Sanches', 'Raul', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraarticulos`
--

DROP TABLE IF EXISTS `compraarticulos`;
CREATE TABLE IF NOT EXISTS `compraarticulos` (
  `idca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idCompra` int(10) UNSIGNED NOT NULL,
  `idArticulo` varchar(13) NOT NULL,
  `Cantidad` decimal(10,2) UNSIGNED NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idca`,`idCompra`) USING BTREE,
  KEY `FK_compra_articulo_1` (`idArticulo`),
  KEY `FK_compra_articulo_2` (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `idCompra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codProveedor` varchar(11) NOT NULL,
  `RazonSocial` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `FK_compras_1Articulo` (`Fecha`) USING BTREE,
  KEY `codProveedor` (`codProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_articulos`
--

DROP TABLE IF EXISTS `contador_articulos`;
CREATE TABLE IF NOT EXISTS `contador_articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(3) NOT NULL,
  `numeral` int(4) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contador_articulos`
--

INSERT INTO `contador_articulos` (`id`, `prefijo`, `numeral`) VALUES
(8, 'Fer', 0018),
(7, 'Cla', 0000),
(6, 'Ase', 0000),
(5, 'Ais', 0013),
(9, 'Her', 0008),
(10, 'Mac', 0007),
(11, 'Pre', 0008),
(12, 'Tab', 0007),
(13, 'Ter', 0011),
(14, 'Tir', 0027),
(15, 'Vig', 0000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturae`
--

DROP TABLE IF EXISTS `facturae`;
CREATE TABLE IF NOT EXISTS `facturae` (
  `indice` int(11) NOT NULL AUTO_INCREMENT,
  `ptovta` varchar(5) NOT NULL,
  `nufactura` varchar(45) NOT NULL,
  `CAE` varchar(15) NOT NULL,
  `fechavto` date NOT NULL,
  `codbarra` varchar(40) NOT NULL,
  `Tipocbte` int(3) NOT NULL,
  `Concepto` int(3) NOT NULL,
  `DocTipo` int(3) NOT NULL,
  `DocNro` bigint(11) NOT NULL,
  `CbteFch` date NOT NULL,
  `ImpNeto` decimal(10,2) NOT NULL,
  `ImpTotConc` decimal(10,2) NOT NULL,
  `ImpIVA` decimal(10,2) NOT NULL,
  `ImpTrib` decimal(10,2) NOT NULL,
  `ImpOpEx` decimal(10,2) NOT NULL,
  `ImpTotal` decimal(10,2) NOT NULL,
  `FchServDesde` date NOT NULL,
  `FchServHasta` date NOT NULL,
  `CAsocTipo` int(3) NOT NULL,
  `CAsocPtoVta` varchar(6) NOT NULL,
  `CAsocNro` varchar(45) NOT NULL,
  `TribId` int(3) NOT NULL,
  `TribDesc` varchar(25) NOT NULL,
  `TribBaseImp` decimal(10,2) NOT NULL,
  `TriAlic` decimal(10,2) NOT NULL,
  `TriImporte` decimal(10,2) NOT NULL,
  `CondIVAcliente` int(3) NOT NULL,
  `CondVenta` varchar(10) NOT NULL,
  PRIMARY KEY (`indice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaedetalle`
--

DROP TABLE IF EXISTS `facturaedetalle`;
CREATE TABLE IF NOT EXISTS `facturaedetalle` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `ptovta` varchar(5) NOT NULL,
  `nufactura` int(11) NOT NULL,
  `Tipocbte` int(3) NOT NULL,
  `Producto` varchar(13) NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcaarticulo`
--

DROP TABLE IF EXISTS `marcaarticulo`;
CREATE TABLE IF NOT EXISTS `marcaarticulo` (
  `Marca` varchar(20) NOT NULL,
  PRIMARY KEY (`Marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcaarticulo`
--

INSERT INTO `marcaarticulo` (`Marca`) VALUES
('Aserradero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misdatos`
--

DROP TABLE IF EXISTS `misdatos`;
CREATE TABLE IF NOT EXISTS `misdatos` (
  `RazonSocial` varchar(45) NOT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Cuit` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`RazonSocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `misdatos`
--

INSERT INTO `misdatos` (`RazonSocial`, `Direccion`, `Ciudad`, `Telefono`, `Email`, `Cuit`) VALUES
('Maderas Mercedes', 'Av. los Inmigrantes N 3175', 'Mercedes', ' 02324422410', '@gmail', '00-00000000-0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

DROP TABLE IF EXISTS `presupuesto`;
CREATE TABLE IF NOT EXISTS `presupuesto` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(11) CHARACTER SET utf8 NOT NULL,
  `RazonSocial` varchar(45) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`numero`, `cliente`, `RazonSocial`, `fecha`, `Total`, `estado`) VALUES
(125, '23892144', 'Sanches Raul ', '2021-09-27', '6150.00', 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestodetalle`
--

DROP TABLE IF EXISTS `presupuestodetalle`;
CREATE TABLE IF NOT EXISTS `presupuestodetalle` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `presupuesto` int(11) NOT NULL,
  `articulo` varchar(13) NOT NULL,
  `Preciounidad` decimal(10,2) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idp`,`presupuesto`),
  KEY `pedido` (`presupuesto`),
  KEY `producto` (`articulo`),
  KEY `articulo` (`articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presupuestodetalle`
--

INSERT INTO `presupuestodetalle` (`idp`, `presupuesto`, `articulo`, `Preciounidad`, `cantidad`, `Importe`) VALUES
(234, 125, 'Tir0021', '1230.00', '5.00', '6150.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `codProveedor` varchar(11) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `RazonSocial` varchar(45) NOT NULL,
  `Domicilio` varchar(45) NOT NULL,
  `TelFijo` varchar(45) NOT NULL,
  `TelCelular` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `CodigoPostal` varchar(45) NOT NULL,
  `Provincia` varchar(45) NOT NULL,
  PRIMARY KEY (`codProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codProveedor`, `Apellido`, `Nombre`, `RazonSocial`, `Domicilio`, `TelFijo`, `TelCelular`, `Email`, `Ciudad`, `CodigoPostal`, `Provincia`) VALUES
('30000000005', '.', 'Fernando', 'Maderas Mercedes', 'Av. los Inmigrantes 3157', '2324422410', '5493755447955', '', 'Mercedes', '6600', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubroarticulo`
--

DROP TABLE IF EXISTS `rubroarticulo`;
CREATE TABLE IF NOT EXISTS `rubroarticulo` (
  `Rubro` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rubroarticulo`
--

INSERT INTO `rubroarticulo` (`Rubro`) VALUES
('Aislantes'),
('Aserradero'),
('Clavaderas'),
('Ferreteria'),
('Herreria'),
('Machimbres'),
('Preservadores'),
('Tablas'),
('Terminaciones'),
('Tiranteria'),
('Vigas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockarticulos`
--

DROP TABLE IF EXISTS `stockarticulos`;
CREATE TABLE IF NOT EXISTS `stockarticulos` (
  `idArticulo` varchar(13) NOT NULL,
  `Stock` int(10) UNSIGNED NOT NULL,
  `StockMinimo` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idArticulo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stockarticulos`
--

INSERT INTO `stockarticulos` (`idArticulo`, `Stock`, `StockMinimo`) VALUES
('Ais0001', 0, 0),
('Ais0002', 0, 0),
('Ais0003', 0, 0),
('Ais0004', 0, 0),
('Ais0005', 0, 0),
('Ais0006', 0, 0),
('Ais0007', 0, 0),
('Ais0008', 0, 0),
('Ais0009', 0, 0),
('Ais0010', 0, 0),
('Ais0011', 0, 0),
('Ais0012', 0, 0),
('Ais0013', 0, 0),
('Fer0001', 0, 0),
('Fer0002', 0, 0),
('Fer0003', 0, 0),
('Fer0004', 0, 0),
('Fer0005', 0, 0),
('Fer0006', 0, 0),
('Fer0007', 0, 0),
('Fer0008', 0, 0),
('Fer0009', 0, 0),
('Fer0010', 0, 0),
('Fer0011', 0, 0),
('Fer0012', 0, 0),
('Fer0013', 0, 0),
('Fer0014', 0, 0),
('Fer0015', 0, 0),
('Fer0016', 0, 0),
('Fer0017', 0, 0),
('Fer0018', 0, 0),
('Her0001', 0, 0),
('Her0002', 0, 0),
('Her0003', 0, 0),
('Her0004', 0, 0),
('Her0005', 0, 0),
('Her0006', 0, 0),
('Her0007', 0, 0),
('Her0008', 0, 0),
('Mac0001', 0, 0),
('Mac0002', 0, 0),
('Mac0003', 0, 0),
('Mac0004', 0, 0),
('Mac0005', 0, 0),
('Mac0006', 0, 0),
('Mac0007', 0, 0),
('Pre0001', 0, 0),
('Pre0002', 0, 0),
('Pre0003', 0, 0),
('Pre0004', 0, 0),
('Pre0005', 0, 0),
('Pre0006', 0, 0),
('Pre0007', 0, 0),
('Pre0008', 0, 0),
('Tab0001', 0, 0),
('Tab0002', 0, 0),
('Tab0003', 0, 0),
('Tab0004', 0, 0),
('Tab0005', 0, 0),
('Tab0006', 0, 0),
('Tab0007', 0, 0),
('Ter0001', 0, 0),
('Ter0002', 0, 0),
('Ter0003', 0, 0),
('Ter0004', 0, 0),
('Ter0005', 0, 0),
('Ter0006', 0, 0),
('Ter0007', 0, 0),
('Ter0008', 0, 0),
('Ter0009', 0, 0),
('Ter0010', 0, 0),
('Ter0011', 0, 0),
('Tir0001', 0, 0),
('Tir0002', 0, 0),
('Tir0003', 0, 0),
('Tir0004', 0, 0),
('Tir0005', 0, 0),
('Tir0006', 0, 0),
('Tir0007', 0, 0),
('Tir0008', 0, 0),
('Tir0009', 0, 0),
('Tir0010', 0, 0),
('Tir0011', 0, 0),
('Tir0012', 0, 0),
('Tir0013', 0, 0),
('Tir0014', 0, 0),
('Tir0015', 0, 0),
('Tir0016', 0, 0),
('Tir0017', 0, 0),
('Tir0018', 0, 0),
('Tir0019', 0, 0),
('Tir0020', 0, 0),
('Tir0021', 0, 0),
('Tir0022', 0, 0),
('Tir0023', 0, 0),
('Tir0024', 0, 0),
('Tir0025', 0, 0),
('Tir0026', 0, 0),
('Tir0027', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`) VALUES
(60, 'gdjuarez', 'c5a71c3339e86c6d7adde94afd05d6f8eb4a37b8'),
(61, 'Fede', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(62, 'Fernando', 'dd01903921ea24941c26a48f2cec24e0bb0e8cc7'),
(63, 'yami', '618dcdfb0cd9ae4481164961c4796dd8e3930c8d');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compraarticulos`
--
ALTER TABLE `compraarticulos`
  ADD CONSTRAINT `FK_compra_articulo_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`),
  ADD CONSTRAINT `FK_compra_articulo_2` FOREIGN KEY (`idCompra`) REFERENCES `compras` (`idCompra`);

--
-- Filtros para la tabla `presupuestodetalle`
--
ALTER TABLE `presupuestodetalle`
  ADD CONSTRAINT `presupuestodetalle_ibfk_1` FOREIGN KEY (`articulo`) REFERENCES `articulo` (`idArticulo`),
  ADD CONSTRAINT `presupuestodetalle_ibfk_2` FOREIGN KEY (`presupuesto`) REFERENCES `presupuesto` (`numero`);

--
-- Filtros para la tabla `stockarticulos`
--
ALTER TABLE `stockarticulos`
  ADD CONSTRAINT `FK_stockarticulos_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
