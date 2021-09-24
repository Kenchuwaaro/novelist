

import { Grid } from '@material-ui/core';
import { IconButton } from '@material-ui/core';
import { Delete } from '@material-ui/icons';
import React, { useState } from 'react';

function UserIndex() {

    const [users, setUsers] = useState(null);

    fetch("http://127.0.0.1:8000/api/user").then((result) => {
        return result.json();
    }).catch((error)=>{

    }).then((json) => {
        const users = new Array();
        for (let i = 0; i < json.length; i++) {
            const user = new Object();
            user.id = json[i].id;
            user.name = json[i].name;
            user.email = json[i].email;
            user.password = json[i].password;
            users.push(user);
        }
        setUsers(users);
    }).catch((error) => {
        setUsers(error);
    });


    return (
        users === null ? <div>
            Loading
        </div> :
            <div>
                <table className="table text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>password</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            users.map((value) => {
                                return <tr key={value.id}>
                                    <td> {value.id} </td>
                                    <td> {value.name} </td>
                                    <td> {value.email} </td>
                                    <td> {value.password} </td>
                                    <td><IconButton>
                                        <Delete />
                                    </IconButton></td>
                                </tr>;
                            })
                        }
                    </tbody>
                </table>
            </div>);
}

export default UserIndex;
