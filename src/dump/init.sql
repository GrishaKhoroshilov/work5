CREATE TABLE `users` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`email`  varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' ,
`login`  varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' ,
`password`  varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' ,
`fio`  varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' ,
PRIMARY KEY (`id`),
UNIQUE INDEX `idx_login` (`login`) USING BTREE
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicode_ci
AUTO_INCREMENT=1
ROW_FORMAT=DYNAMIC
;