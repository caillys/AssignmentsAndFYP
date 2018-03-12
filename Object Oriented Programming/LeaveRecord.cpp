#include <iostream>
#include <string>
#include <vector>
#include <cstdlib>
#include "LeaveRecord.h"

using namespace std;

string LeaveRecord::getStartDate() {
    return startDate;
}

string LeaveRecord::getEndDate() {
    return endDate;
}

string LeaveRecord::getType() {
    return type;
}

string LeaveRecord::getReason() {
    return reason;
}

string LeaveRecord::getApprover() {
    return approver;
}

string LeaveRecord::getStatus() {
    return status;
}


void LeaveRecord::display() {
    //cout << "Received a new leave record!\n" << endl;
    cout << "\n";
    cout << "        ================================================ " << endl
         << "        |              STAFF LEAVE RECORDS             |" << endl
         << "        ================================================ \n" << endl;
    cout << "Start date (dd/mm/yyyy)\t: " << startDate << endl;
    cout << "End date (dd/mm/yyyy)\t: " << endDate << endl;
    cout << "Type of leave\t\t: " << type << endl;
    cout << "Written reason\t\t: " << reason << endl;
    cout << "Approved by\t\t: " << approver << endl;
    cout << "Status\t\t\t: " << status << endl;
}
