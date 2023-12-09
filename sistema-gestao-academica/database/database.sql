create table users (
  id integer not null primary key auto_increment,
  name varchar(100) not null,
  email varchar(100) not null,
  password varchar(32) not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp()
);
insert into users (name, email, password) values ('Administrador do Sistema', 'admin@email.com.br', md5('admin'));

create table courses (
  id integer not null primary key auto_increment,
  name varchar(100) not null,
  description varchar(255) not null,
  period integer not null,
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp(),

  foreign key (user_id) references users (id)
);

create table subjects (
  id integer not null primary key auto_increment,
  name varchar(100) not null,
  workload integer not null,
  summary text,
  course_id integer not null,
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp(),

  foreign key (course_id) references courses (id),
  foreign key (user_id) references users (id)
);

create table professors (
  id integer not null primary key auto_increment,
  name varchar(100) not null,
  title varchar(100) not null,
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp(),

  foreign key (user_id) references users (id)
);

create table professor_subjects (
  id integer not null primary key auto_increment,
  professor_id integer not null,
  subject_id integer not null
);
alter table professor_subjects add foreign key (professor_id) references professors(id);
alter table professor_subjects add foreign key (subject_id) references subjects(id);

create table classes (
  id integer not null primary key auto_increment,
  description varchar(255) not null,
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp(),

  foreign key (user_id) references users (id)
);

create table class_subjects (
  id integer not null primary key auto_increment,
  class_id integer not null,
  subject_id integer not null,
  professor_id integer not null,

  foreign key (class_id) references classes (id),
  foreign key (subject_id) references subjects (id),
  foreign key (professor_id) references professors (id)
);

create table students (
  id integer not null primary key auto_increment,
  name varchar(100) not null,
  cpf char(11) not null,
  birth_date date not null,
  phone varchar(15),
  cell_phone varchar(15),
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp(),
  foreign key (user_id) references users (id)
);

create table student_courses (
  id integer not null primary key auto_increment,
  student_id integer not null,
  course_id integer not null,
  class_id integer not null,
  status integer not null default 1,
  user_id integer not null,
  created_at datetime default current_timestamp(),
  updated_at datetime default current_timestamp()
);
alter table student_courses add foreign key (student_id) references students (id);
alter table student_courses add foreign key (course_id) references courses (id);
alter table student_courses add foreign key (class_id) references classes (id);
alter table student_courses add foreign key (user_id) references users (id);