USE []

GO

DROP TABLE IF EXISTS Admin;
GO
CREATE TABLE Admin(
id int IDENTITY NOT NULL PRIMARY KEY,
courriel nvarchar(50) NOT NULL,
passwd varchar(255) NOT NULL
)
GO
SET IDENTITY_INSERT [dbo].[Admin] ON 
GO
INSERT [dbo].[Admin] ([id], [courriel], [passwd]) VALUES (1, N'samuel_bourque123@hotmail.com', N'$2y$10$qsl.WMIFtHISnfk/78FnfOKe1dXp5FM.Z28tfWetMR0qTX6cqiNeq')
GO
SET IDENTITY_INSERT [dbo].[Admin] OFF
GO



DROP TABLE IF EXISTS Clients;

GO
CREATE TABLE Clients (

id int IDENTITY(1,1) PRIMARY KEY,
prenom nvarchar(50), 
nom nvarchar(50),
courriel varchar(250) NOT NULL,
passwd varchar(255) NOT NULL,
prixDepart decimal(4, 2)
)

GO



DROP TABLE IF EXISTS Produits;

GO
CREATE TABLE Produits (

id int IDENTITY(1,1) PRIMARY KEY, 
nom nvarchar(50),
images nvarchar(50),
prix decimal(4, 2),
quantite int
)

GO

Insert into Produits values ('Big Mac', 'Hamburger', 5.00, 10)
Insert into Produits values ('Poutine', 'Poutine', 3.00, 10)
Insert into Produits values ('Coke', 'Breuvage', 1.00, 10)

Go

