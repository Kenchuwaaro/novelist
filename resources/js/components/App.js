
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import UserIndex from './user/UserIndex';

function App() {
    return (
        <div className="container">
        <div className="row justify-content-center">
            <div className="col-md-8">
                <Router>
                    <Route path='/user' component={ UserIndex } />
                </Router>
            </div>
        </div>
    </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
