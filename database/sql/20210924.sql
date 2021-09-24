create table users(
    id bigint auto_increment primary key,
    name varchar(255),
    email varchar(255) unique,
    password varchar(255)
);

create table comments(
    id bigint auto_increment primary key,
    comment varchar(255),
    user_id bigint,
    foreign key ( user_id )
        references users(id)
        on delete cascade
);

create table book_shelves(
    id bigint auto_increment primary key,
    title varchar(255),
    user_id bigint,
    foreign key ( user_id )
        references users(id)
        on delete cascade
);

create table novels(
    id bigint auto_increment primary key,
    title varchar(255),
    user_id bigint,
    foreign key ( user_id )
        references users(id)
        on delete cascade
);

create table chapters(
    id bigint auto_increment primary key,
    title varchar(255),
    novel_id bigint,
    foreign key ( novel_id )
        references novels(id)
        on delete cascade
);

create table episodes(
    id bigint auto_increment primary key,
    title varchar(255),
    chapter_id bigint,
    foreign key ( chapter_id )
        references chapters(id)
        on delete cascade,
    novel text
);

create table book_shelf_novel_links (
    id bigint auto_increment primary key,
    book_shelf_id bigint,
    foreign key ( book_shelf_id )
        references book_shelves( id )
        on delete cascade,
    novel_id bigint,
    foreign key ( novel_id )
        references novels( id )
        on delete cascade
);

create table bookmarks(
    id bigint auto_increment primary key,
    last_read_episode_id bigint, 
        foreign key ( last_read_episode_id )
        references episodes(id)
        on delete cascade,
    user_id bigint,
        foreign key ( user_id )
        references users(id)
        on delete cascade
);

create table reviews (
    id bigint auto_increment primary key,
    user_id bigint,
    foreign key ( user_id )
        references users( id )
        on delete cascade,
    novel_id bigint,
    foreign key ( novel_id )
        references novels( id )
        on delete cascade,
    rating int
);


create table subscribes (
    id bigint auto_increment primary key,
    subscriber_id bigint,
    foreign key ( subscriber_id )
        references users( id )
        on delete cascade,
    subscribee_id bigint,
    foreign key ( subscribee_id )
        references users( id )
        on delete cascade
);

