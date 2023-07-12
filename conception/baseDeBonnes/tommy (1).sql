#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: types
#------------------------------------------------------------
CREATE TABLE types(
        id Int Auto_increment NOT NULL,
        name Varchar (20) NOT NULL,
        CONSTRAINT types_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: arks
#------------------------------------------------------------
CREATE TABLE arks(
        id Int Auto_increment NOT NULL,
        name Varchar (150) NOT NULL,
        CONSTRAINT arks_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: licences
#------------------------------------------------------------
CREATE TABLE licences(
        id Int Auto_increment NOT NULL,
        name Varchar (30) NOT NULL,
        CONSTRAINT licences_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: languages
#------------------------------------------------------------
CREATE TABLE languages(
        id Int Auto_increment NOT NULL,
        name Varchar (30) NOT NULL,
        CONSTRAINT languages_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: editors
#------------------------------------------------------------
CREATE TABLE editors(
        id Int Auto_increment NOT NULL,
        name Varchar (30) NOT NULL,
        CONSTRAINT editors_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: conditions
#------------------------------------------------------------
CREATE TABLE conditions(
        id Int Auto_increment NOT NULL,
        name Varchar (10) NOT NULL,
        CONSTRAINT conditions_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: cities
#------------------------------------------------------------
CREATE TABLE cities(
        id Int Auto_increment NOT NULL,
        postalCode Varchar (5) NOT NULL,
        city Varchar (50) NOT NULL,
        CONSTRAINT cities_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: clients
#------------------------------------------------------------
CREATE TABLE clients(
        id Int Auto_increment NOT NULL,
        lastname Varchar (50) NOT NULL,
        firstname Varchar (50) NOT NULL,
        email Varchar (100) NOT NULL,
        address Varchar (150) NOT NULL,
        password Varchar (255) NOT NULL,
        reference Varchar (7) NOT NULL,
        points Int NOT NULL,
        id_cities Int NOT NULL,
        CONSTRAINT clients_PK PRIMARY KEY (id),
        CONSTRAINT clients_cities_FK FOREIGN KEY (id_cities) REFERENCES cities(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: categories
#------------------------------------------------------------
CREATE TABLE categories(
        id Int Auto_increment NOT NULL,
        name Varchar (50) NOT NULL,
        CONSTRAINT categories_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: orders
#------------------------------------------------------------
CREATE TABLE orders(
        id Int Auto_increment NOT NULL,
        date Datetime NOT NULL,
        discountAmount Int NOT NULL,
        id_clients Int NOT NULL,
        CONSTRAINT orders_PK PRIMARY KEY (id),
        CONSTRAINT orders_clients_FK FOREIGN KEY (id_clients) REFERENCES clients(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: authors
#------------------------------------------------------------
CREATE TABLE authors(
        id Int Auto_increment NOT NULL,
        name Varchar (60) NOT NULL,
        CONSTRAINT authors_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table:  mangaBooks
#------------------------------------------------------------
CREATE TABLE mangaBooks(
        id Int Auto_increment NOT NULL,
        name Varchar (100) NOT NULL,
        tomeNumber Int NOT NULL,
        description Text NOT NULL,
        releaseDate Date NOT NULL,
        cover Varchar (255) NOT NULL,
        id_licences Int NOT NULL,
        id_conditions Int NOT NULL,
        id_editors Int NOT NULL,
        id_arks Int,
        id_languages Int NOT NULL,
        id_authors Int NOT NULL,
        CONSTRAINT mangaBooks_PK PRIMARY KEY (id),
        CONSTRAINT mangaBooks_licences_FK FOREIGN KEY (id_licences) REFERENCES licences(id),
        CONSTRAINT mangaBooks_conditions0_FK FOREIGN KEY (id_conditions) REFERENCES conditions(id),
        CONSTRAINT mangaBooks_editors1_FK FOREIGN KEY (id_editors) REFERENCES editors(id),
        CONSTRAINT mangaBooks_arks2_FK FOREIGN KEY (id_arks) REFERENCES arks(id),
        CONSTRAINT mangaBooks_languages3_FK FOREIGN KEY (id_languages) REFERENCES languages(id),
        CONSTRAINT mangaBooks_authors4_FK FOREIGN KEY (id_authors) REFERENCES authors(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: mangasTypes
#------------------------------------------------------------
CREATE TABLE mangasTypes(
        id Int NOT NULL,
        id__mangaBooks Int NOT NULL,
        CONSTRAINT mangasTypes_PK PRIMARY KEY (id, id__mangaBooks),
        CONSTRAINT mangasTypes_types_FK FOREIGN KEY (id) REFERENCES types(id),
        CONSTRAINT mangasTypes_mangaBooks0_FK FOREIGN KEY (id__mangaBooks) REFERENCES mangaBooks(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: favorites
#------------------------------------------------------------
CREATE TABLE favorites(
        id Int NOT NULL,
        id_clients Int NOT NULL,
        CONSTRAINT favorites_PK PRIMARY KEY (id, id_clients),
        CONSTRAINT favorites_mangaBooks_FK FOREIGN KEY (id) REFERENCES mangaBooks(id),
        CONSTRAINT favorites_clients0_FK FOREIGN KEY (id_clients) REFERENCES clients(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: mangasCategories
#------------------------------------------------------------
CREATE TABLE mangasCategories(
        id Int NOT NULL,
        id_mangaBooks Int NOT NULL,
        CONSTRAINT mangasCategories_PK PRIMARY KEY (id, id__mangaBooks),
        CONSTRAINT mangasCategories_categories_FK FOREIGN KEY (id) REFERENCES categories(id),
        CONSTRAINT mangasCategories_mangaBooks0_FK FOREIGN KEY (id_mangaBooks) REFERENCES mangaBooks(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: contents
#------------------------------------------------------------
CREATE TABLE contents(
        id_orders Int NOT NULL,
        id_mangaBooks Int NOT NULL,
        CONSTRAINT contents_PK PRIMARY KEY (id_orders, id_mangaBooks),
        CONSTRAINT contents_orders_FK FOREIGN KEY (id_orders) REFERENCES orders(id),
        CONSTRAINT contents_mangaBooks0_FK FOREIGN KEY (id_mangaBooks) REFERENCES mangaBooks(id)
) ENGINE = InnoDB;