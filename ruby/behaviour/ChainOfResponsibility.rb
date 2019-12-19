#Chain

module Chain

    class LeaveMsg
        attr_reader :name,:day
        @day
        @name
        def initialize(name,day)
            @day=day
            @name=name
        end
    end
    class Leader
        attr_accessor :nextLeader
        @nextLeader
        @name
        def initialize(name)
            @name=name
        end
        def handleLeaveRequest(leaveMsg)
            puts "#{@name} is handling #{leaveMsg.name}' #{leaveMsg.day} days Request"
            @nextLeader.handleLeaveRequest(leaveMsg) if @nextLeader
        end
    end

    module Test
        l1 = Leader.new '章三'
        l2 = Leader.new '章三2'
        l3 = Leader.new '章三3'
        l1.nextLeader = l2
        l2.nextLeader = l3

        msg = LeaveMsg.new '病假', 3

        l1.handleLeaveRequest msg
    end
end