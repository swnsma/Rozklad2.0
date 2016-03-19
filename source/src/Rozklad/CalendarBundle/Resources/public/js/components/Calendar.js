/**
 * Created by tania on 14.03.16.
 */


class Calendar extends React.Component {
    componentDidMount() {
        const {calendar} = this.refs;
        $(calendar).fullCalendar({
            events: this.props.events,
            firstDay: 1
        });
    }

    componentWillUnmount() {
        const {calendar} = this.refs;
        $(calendar).fullCalendar('destroy');
    }

    render() {
        return (
            <div ref="calendar"></div>
        );
    }
}
window.Calendar = Calendar;


