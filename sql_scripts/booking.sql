CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movieID INT(10) NOT NULL,
    seatID INT(10) NOT NULL,
    onlineDealsID INT(10) NOT NULL,
    FOREIGN KEY (movieID) REFERENCES movies(id),
    FOREIGN KEY (seatID) REFERENCES seats(id), 
    FOREIGN KEY (onlineDealsID) REFERENCES online_deals(id)
);
