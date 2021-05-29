USE [];
GO

DROP TABLE IF EXISTS Gestionnaires;
GO
CREATE TABLE Gestionnaires(
id int IDENTITY NOT NULL PRIMARY KEY,
courriel varchar(50) NOT NULL,
passwd varchar(255) NOT NULL
)
GO
SET IDENTITY_INSERT [dbo].[Gestionnaires] ON 
GO
INSERT [dbo].[Gestionnaires] ([id], [courriel], [passwd]) VALUES (2, N'hellovideo2021@gmail.com', N'$2y$10$2OwvpFgkJeWOPnZcIsgL6Orjw4iohZtj7IGbr55FFAiiHydcR.F7G')
GO
SET IDENTITY_INSERT [dbo].[Gestionnaires] OFF
GO

DROP TABLE IF EXISTS Videos;

GO
CREATE TABLE Videos (

id int IDENTITY NOT NULL PRIMARY KEY,
code varchar(20) UNIQUE NOT NULL, 
titre varchar(50),
description varchar(255),
tag varchar(20)
)

GO

DROP TABLE  IF EXISTS Tutoriels;

GO
CREATE TABLE Tutoriels (

id int IDENTITY NOT NULL PRIMARY KEY,
code varchar(20) UNIQUE NOT NULL, 
titre varchar(50),
description varchar(255),
estAnglais bit DEFAULT 'FALSE'
)

GO

DROP TABLE IF EXISTS EnAttente;

GO

CREATE TABLE EnAttente(
id int IDENTITY NOT NULL PRIMARY KEY,
email varchar(50) NOT NULL,
code varchar(20) UNIQUE NOT NULL, 
titre varchar(50),
description varchar(255)
);
GO

DROP TRIGGER IF EXISTS checktablelimit ON DATABASE

GO

CREATE TRIGGER checktablelimit 
ON EnAttente
INSTEAD OF INSERT 
AS 
  DECLARE @currentCount INT 

  SELECT @currentCount = COUNT(*) 
  FROM   EnAttente

  IF @currentCount = 30 
    BEGIN 
        RAISERROR ('Table already has 30 records', 
                   11, 
                   1); 
    END 
  ELSE 
    BEGIN 
        INSERT INTO EnAttente 
                    (email, 
                     code, 
                     titre,
					 description) 
        SELECT email, 
               code, 
               titre,
			   description
        FROM   inserted 
    END 

GO 
