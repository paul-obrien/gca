#!/usr/bin/python
import mysql.connector
from mysql.connector import errorcode

config = {
    'user' : 'fpuser',
    'password': 'fpuser',
    'host' : 'localhost',
    'database' : 'gca'
    }

try:
    cnx = mysql.connector.connect(**config)
except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exist")
    else:
        print(err)
else:
    cursor = cnx.cursor()
    add_data = ("INSERT INTO test "
               "(field_1, field_2) "
               "VALUES (%s, %s)")
    data = ('Entry 5', 122)
    cursor.execute(add_data, data)
    data_id = cursor.lastrowid

    cnx.commit()
    print ("SUCCESS - %s" % data_id)

    query = ("SELECT field_1, field_2 FROM test "
         "WHERE id BETWEEN %s AND %s")

    start = 1
    end = 3

    cursor.execute(query, (start, end))

    for (field_1, field_2) in cursor:
        print("{}, {}".format(
             field_1, field_2))

    cursor.close()
finally:
    cnx.close()
