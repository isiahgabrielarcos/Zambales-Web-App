  -- db/setup.sql
  -- Run once against the zambales_tourism database (after users/inquiries already exist)
  -- to add the accommodations review feature.

  CREATE TABLE IF NOT EXISTS `accommodations` (
    `id`           INT(11) NOT NULL AUTO_INCREMENT,
    `name`         VARCHAR(200) NOT NULL,
    `type`         ENUM('resort','hotel','inn') NOT NULL,
    `description`  TEXT NOT NULL,
    `location`     VARCHAR(300) NOT NULL,
    `image_url`    VARCHAR(500) NOT NULL,
    `stars`        TINYINT(1) NOT NULL,
    `website_url`  VARCHAR(500) DEFAULT NULL,
    `maps_url`     VARCHAR(1000) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  CREATE TABLE IF NOT EXISTS `reviews` (
    `id`                INT(11) NOT NULL AUTO_INCREMENT,
    `accommodation_id`  INT(11) NOT NULL,
    `user_id`           INT(11) NOT NULL,
    `rating`            TINYINT(1) NOT NULL,
    `comment`           TEXT NOT NULL,
    `created_at`        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_accommodation_user` (`accommodation_id`, `user_id`),
    CONSTRAINT `fk_reviews_accommodation` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_reviews_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  INSERT INTO `accommodations` (`name`, `type`, `description`, `location`, `image_url`, `stars`, `website_url`, `maps_url`) VALUES
  ('Subic Bay Yacht Club Resort', 'resort',
  'A premier waterfront resort overlooking Subic Bay with full marina access, water sports facilities, infinity pool, and panoramic sea view dining. Ideal for families and diving enthusiasts.',
  'Waterfront Rd, Subic Bay Freeport Zone',
  'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=600&q=80',
  5, NULL,
  'https://www.google.com/maps/search/?api=1&query=Subic+Bay+Yacht+Club+Resort%2C+Waterfront+Rd%2C+Subic+Bay+Freeport+Zone'),

  ('Crystal Beach Resort', 'resort',
  'A family-friendly beachfront resort in San Antonio with crystal-clear water perfect for swimming and snorkelling. Offers air-conditioned rooms, native cottages, kayak rentals, and a seafood restaurant.',
  'Pundaquit, San Antonio, Zambales',
  'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=600&q=80',
  4, NULL,
  'https://www.google.com/maps/search/?api=1&query=Crystal+Beach+Resort%2C+Pundaquit%2C+San+Antonio%2C+Zambales'),

  ('Harbor Point Suites', 'hotel',
  'Modern business hotel within the Subic Bay Freeport Zone. Walking distance to Harbor Point mall, dining options, and the waterfront promenade. Great for both leisure and corporate travellers.',
  'Harbor Point, Subic Bay Freeport Zone',
  'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&q=80',
  4, NULL,
  'https://www.google.com/maps/search/?api=1&query=Harbor+Point+Suites%2C+Harbor+Point%2C+Subic+Bay+Freeport+Zone'),

  ('Balay ni Lola Guesthouse', 'inn',
  'A charming budget-friendly guesthouse near Iba town proper. Run by a local family with home-cooked breakfast, WiFi, and a small garden. Perfect for solo travellers and backpackers exploring the province.',
  'Iba, Zambales (Town Proper)',
  'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?w=600&q=80',
  3, NULL,
  'https://www.google.com/maps/search/?api=1&query=Balay+ni+Lola+Guesthouse%2C+Iba%2C+Zambales'),

  ('Liwliwa Surf Camp & Resort', 'resort',
  'The go-to stay for surfers in San Felipe. Native-style cottages steps from the waves, surf board rentals and lessons, an outdoor bar, and a community of like-minded ocean lovers. Bookings fill quickly during surf season.',
  'Liwliwa, San Felipe, Zambales',
  'https://images.unsplash.com/photo-1540541338537-4680c781f5c9?w=600&q=80',
  4, NULL,
  'https://www.google.com/maps/search/?api=1&query=Liwliwa+Surf+Camp+%26+Resort%2C+Liwliwa%2C+San+Felipe%2C+Zambales'),

  ('Olongapo Travellers Inn', 'hotel',
  'A practical mid-range hotel in central Olongapo. Clean rooms with private bathroom, free WiFi, and air-conditioning. Walking distance to restaurants, bus terminals, and the Olongapo market. Good base for exploring both Subic and the coves.',
  'Magsaysay Dr, Olongapo City',
  'https://images.unsplash.com/photo-1455587734955-081b22074882?w=600&q=80',
  3, NULL,
  'https://www.google.com/maps/search/?api=1&query=Olongapo+Travellers+Inn%2C+Magsaysay+Dr%2C+Olongapo+City');
