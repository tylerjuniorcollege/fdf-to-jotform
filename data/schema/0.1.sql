-- Adminer 4.1.0 SQLite 3 dump

DROP TABLE IF EXISTS "form";
CREATE TABLE "form" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "jotformid" integer NOT NULL,
  "name" text NOT NULL
);

INSERT INTO "form" ("id", "jotformid", "name") VALUES (1,	43284225528961,	'External Funding Request Form');
INSERT INTO "form" ("id", "jotformid", "name") VALUES (2,	51525414183955,	'Dental Hygiene Admission Worksheet');

DROP TABLE IF EXISTS "form_html";
CREATE TABLE "form_html" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "form_id" integer NOT NULL,
  "html_file" text NOT NULL,
  FOREIGN KEY ("form_id") REFERENCES "form" ("id") ON DELETE CASCADE
);

INSERT INTO "form_html" ("id", "form_id", "html_file") VALUES (1,	2,	'dental/hygeineworksheet.php');

DROP TABLE IF EXISTS "form_pdf";
CREATE TABLE "form_pdf" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "form_id" integer NOT NULL,
  "pdf_file" text NOT NULL, "data_transform" text NULL,
  FOREIGN KEY ("form_id") REFERENCES "form" ("id") ON DELETE CASCADE
);

INSERT INTO "form_pdf" ("id", "form_id", "pdf_file", "data_transform") VALUES (1,	1,	'ExternalFundingForm.pdf',	'ExternalFundingRequestTransform');
INSERT INTO "form_pdf" ("id", "form_id", "pdf_file", "data_transform") VALUES (2,	2,	'DentalHygieneAdmissionForm.pdf',	'DentalHygieneTransform');

-- 